import tailwindcss from "@tailwindcss/vite";
import { defineConfig } from "vite";
import tempest from "vite-plugin-tempest";

export default defineConfig({
  server: {
    host: true,
  },

  plugins: [tailwindcss(), tempest()],
});
