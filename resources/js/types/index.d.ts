import type { PageProps } from '@inertiajs/core';
import type { LucideIcon } from 'lucide-vue-next';
import type { Config } from 'ziggy-js';
import {HTMLAttributes} from "vue";

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface HeaderCell {
    name : string;
    label: string;
    class ?: string;
}
// export interface BodyCell {
//     id: number;
//     data : string;
//     class?: string;
// }

export interface TableBodyProps {
    data: Array;
    headers : Array<HeadersIntefrace>
    numberOfColumn : number
}
export interface HeadersIntefrace {
    name : string;
    label: string;
    type ?: string;
    actions ?: (row: any)=>void;
    class ?: HTMLAttributes['class'];
}
export interface NavItem {
    title: string;
    href: string;
    icon?: LucideIcon;
    isActive?: boolean;
}

export interface SharedData extends PageProps {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    ziggy: Config & { location: string };
    sidebarOpen: boolean;
}

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
}
export interface RoomData {
    id: number;
    name: string;
    img: string;
    description: string;
    address: string;
    size: string;
    max_adults: number;
    max_children: number;
}
export interface FacilityData{
    id: number,
    name : string
}
export type BreadcrumbItemType = BreadcrumbItem;
