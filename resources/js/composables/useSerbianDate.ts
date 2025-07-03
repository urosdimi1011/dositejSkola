import { computed, ref } from 'vue'

export function useSerbianDate(initialDate?: Date) {
    const date = ref(initialDate ?? new Date())

    // Ime dana, npr. "Ponedeljak"
    const dayName = computed(() =>
        date.value
            .toLocaleDateString('sr', { weekday: 'long' })
            .replace(/^\w/, c => c.toUpperCase())
    )

    // Broj dana u mesecu (1–31)
    const day = computed(() => date.value.getDate())

    // Ime meseca na srpskom, npr. "jun"
    const month = computed(() =>
        date.value
            .toLocaleDateString('sr', { month: 'long' })
            .toLowerCase()
    )

    // Godina, npr. 2025
    const year = computed(() => date.value.getFullYear())

    // Puni format: "19. jun 2025."
    const fullDate = computed(() =>
        `${String(day.value).padStart(2, '0')}. ${month.value} ${year.value}.`
    )

    return { date, dayName, day, month, year, fullDate }
}
