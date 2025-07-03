<?php
namespace App\Helpers;

class Breadcrumbs
{
    /**
     * Generiše breadcrumbs na osnovu URL segmenata.
     *
     * U ovom jednostavnom primeru pretpostavljamo da prvi segment
     * predstavlja početak stranice. Koristi se whole URL ažuriran segment po segment.
     *
     * @return array Niz breadcrumb stavki (label i url).
     */
    public static function generate(): array
    {
        $breadcrumbs = [];
        // Dodaj početnu stranicu – definiši svoju početnu rutu, npr. 'home'
        $breadcrumbs[] = [
            'label' => 'Početna',
            'url' => route('home'),
        ];

        // Uzimamo segmente trenutnog URL-a
        $segments = request()->segments();
        $url = '';

        foreach ($segments as $segment) {
            $url .= '/' . $segment;
            // Primer transformacije: "o-nama" postaje "O Nama"
            $label = ucwords(str_replace('-', ' ', $segment));
            $breadcrumbs[] = [
                'label' => $label,
                'url'   => url($url),
            ];
        }

        return $breadcrumbs;
    }
}
