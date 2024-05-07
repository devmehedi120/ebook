import react from "@vitejs/plugin-react";
import { defineConfig } from "vite";
import { resolve } from "path";

export default defineConfig({
  plugins: [
    react({
      include: "src/*.jsx",
    }),
  ],
  root: "",
  build: {
    outDir: resolve(__dirname, "./dist"),
    emptyOutDir: true,
    manifest: false,
    rollupOptions: {
      input: {
        main: resolve(__dirname, "src/main.jsx"), // Assuming your entry point is an index.jsx file
      },
    },
    sourcemap: false,
    minify: true,
    write: true,
  },
  server: {
    cors: true,
    strictPort: true,
    port: 3000,
    https: false,
    hmr: {
      host: "localhost",
    },
  },

  resolve: {
    alias: {
      // You might want to add aliases here for common paths if needed
    },
  },
});
