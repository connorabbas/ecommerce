import { defineConfig, loadEnv } from "vite";
import laravel from "laravel-vite-plugin";

// https://vitejs.dev/config/
export default ({ mode }) => {
    const env = loadEnv(mode, process.cwd());
    const devPort = parseInt(env.VITE_PORT) || 5173;
    const hostDomain = env.VITE_HOST_DOMAIN || "localhost";

    return defineConfig({
        plugins: [
            laravel({
                input: [
                    "resources/assets/styles/app.scss",
                    "resources/assets/js/app.js",
                ],
                refresh: true,
            }),
        ],
        server: {
            port: devPort,
            hmr: {
                host: hostDomain,
            },
            watch: {
                usePolling: true,
            },
        },
        preview: {
            port: devPort,
        },
    });
};
