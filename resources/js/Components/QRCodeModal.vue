<script setup>
import { computed } from "vue";

const props = defineProps({
    link: {
        type: String,
        required: true,
    },
});

const generateQRCodeUrl = (link) => {
    // Implement the logic to generate the QR code URL based on the link
    // For example, you can use a QR code generator library or API
    // Return the generated QR code URL
    return `https://example.com/qrcode?link=${encodeURIComponent(link)}`;
};

const closeModal = () => {
    // Emit an event to close the modal
    emit("close");
};
</script>

<style scoped>
/* Add your custom styles here */
</style>

<template>
    <div class="fixed inset-0 flex items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4">
            <h2 class="text-lg font-semibold mb-4">QR Code</h2>
            <div class="flex flex-col items-center">
                <img
                    :src="generateQRCodeUrl(link)"
                    alt="QR Code"
                    class="w-40 h-40 mb-4"
                />
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                    {{ link }}
                </p>
                <button
                    @click="closeModal"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg"
                >
                    Close
                </button>
            </div>
        </div>
    </div>
</template>
