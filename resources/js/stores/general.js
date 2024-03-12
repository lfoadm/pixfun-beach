import { defineStore } from "pinia";

export const useGeneralStore = defineStore('general', {
    state: () => ({
        isPostOverlay: false,
        isCropperModal: false,
        isImageDisplay: false,
        isCropperModalCover: false,
    }),
    persist: true,
})