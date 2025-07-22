<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffMembersRequest;
use App\Models\Position;
use App\Models\StaffMembers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Illuminate\Support\Str;
class StaffMemebersController extends Controller
{

    public function getAll(){
        $all = StaffMembers::all();
        return response()->json(['osoblje'=>$all]);
    }


    public function getAllWithPosition(){
        $all = Position::with('staffMembers')->orderBy('sort_order','asc')->get();
        return response()->json(['osoblje'=>$all]);
    }

    public function getOne($id){
        $person  = StaffMembers::findOrFail($id);

        return response()->json(['osoba'=>$person]);
    }

    public function getOneWithTemplate(string $slug){
        // 1) “Dekodiraj” slug → lowercase + razmaci
        $decoded = urldecode($slug);

        // 2) Ukloni sve tačke
//        $cleaned = str_replace('.', '', $decoded);

        // 3) Zameni crtice u razmake i spusti u lowercase
        $nameKey = Str::of($decoded)
            ->replace('-', ' ')
            ->lower();
        // 4) Dohvati model i eager-load relacije
        $member = StaffMembers::with(['documents', 'position'])
            ->whereRaw(
                "LOWER(REPLACE(name, '.', '')) = ?",
                [(string) $nameKey]
            )
            ->firstOrFail();
        return Inertia::render('user/StaffTemplate',['osoba'=>$member]);
    }

    public function store(StaffMembersRequest $request){

        try{
            $data = $request->validated();
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')
                    ->store('staff-photos', 'public');
            }

            DB::beginTransaction();
            $member = StaffMembers::create([
                'name'       => $data['name'],
                'email'       => $data['email'],
                'role'       => $data['role'],
                'bio'        => $data['bio'] ?? null,
                'position_id'        => $data['prijava'] ?? null,
                'photo_path' => $photoPath,
            ]);

            if (! empty($data['documents'])) {
                foreach ($data['documents'] as $doc) {
                    // upload fajla
                    $path = $doc['file']->store('staff-documents', 'public');

                    // kreiraj zapis u documents tabeli
                    $member->documents()->create([
                        'title'     => $doc['title'],
                        'type'      => $doc['file']->getClientOriginalExtension(),
                        'file_path' => $path,
                    ]);
                }
            }
            DB::commit();
            return response()->json(['message'=>'Uspesno ste dodali osobu']);
        }
        catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(['message'=>$ex->getMessage()],500);
        }
    }

    public function update(StaffMembersRequest $request, StaffMembers $member)
    {
        try {
            $data = $request->validated();

            DB::beginTransaction();

            // 1. Ako je stigla nova slika – izbriši staru i uploaduj novu
            if ($request->hasFile('photo')) {
                if ($member->photo_path) {
                    Storage::disk('public')->delete($member->photo_path);
                }
                $data['photo_path'] = $request
                    ->file('photo')
                    ->store('staff-photos', 'public');
            }

            // 2. Ažuriraj osnovne podatke
            $member->update([
                'name'       => $data['name'],
                'email'      => $data['email'],
                'role'       => $data['role'],
                'bio'        => $data['bio'] ?? null,
                'position_id'        => $data['prijava'] ?? null,
                'photo_path' => $data['photo_path'] ?? $member->photo_path,
            ]);

            // 3. Dodavanje novih dokumenata (ukoliko ih ima)
            if (! empty($data['documents'])) {
                foreach ($data['documents'] as $doc) {
                    $path = $doc['file']->store('staff-documents', 'public');
                    $member->documents()->create([
                        'title'     => $doc['title'],
                        'type'      => $doc['file']->getClientOriginalExtension(),
                        'file_path' => $path,
                    ]);
                }
            }

            DB::commit();

            return response()
                ->json(['message' => 'Osoblje je uspešno izmenjeno']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()
                ->json(['message' => 'Greška: ' . $ex->getMessage()], 500);
        }
    }


}
