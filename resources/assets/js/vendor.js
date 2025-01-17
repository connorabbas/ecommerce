import axios from "axios";
import htmx from "htmx.org";
import * as bootstrap from "bootstrap";

window.axios = axios;
window.bootstrap = bootstrap;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

//htmx.config.scrollIntoViewOnBoost = false;
