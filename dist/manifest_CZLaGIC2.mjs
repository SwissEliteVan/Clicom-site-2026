import '@astrojs/internal-helpers/path';
import 'cookie';
import 'kleur/colors';
import 'es-module-lexer';
import { N as NOOP_MIDDLEWARE_HEADER, j as decodeKey } from './chunks/astro/server_PoaPgSBg.mjs';
import 'clsx';
import 'html-escaper';

const NOOP_MIDDLEWARE_FN = async (_ctx, next) => {
  const response = await next();
  response.headers.set(NOOP_MIDDLEWARE_HEADER, "true");
  return response;
};

const codeToStatusMap = {
  // Implemented from tRPC error code table
  // https://trpc.io/docs/server/error-handling#error-codes
  BAD_REQUEST: 400,
  UNAUTHORIZED: 401,
  FORBIDDEN: 403,
  NOT_FOUND: 404,
  TIMEOUT: 405,
  CONFLICT: 409,
  PRECONDITION_FAILED: 412,
  PAYLOAD_TOO_LARGE: 413,
  UNSUPPORTED_MEDIA_TYPE: 415,
  UNPROCESSABLE_CONTENT: 422,
  TOO_MANY_REQUESTS: 429,
  CLIENT_CLOSED_REQUEST: 499,
  INTERNAL_SERVER_ERROR: 500
};
Object.entries(codeToStatusMap).reduce(
  // reverse the key-value pairs
  (acc, [key, value]) => ({ ...acc, [value]: key }),
  {}
);

function sanitizeParams(params) {
  return Object.fromEntries(
    Object.entries(params).map(([key, value]) => {
      if (typeof value === "string") {
        return [key, value.normalize().replace(/#/g, "%23").replace(/\?/g, "%3F")];
      }
      return [key, value];
    })
  );
}
function getParameter(part, params) {
  if (part.spread) {
    return params[part.content.slice(3)] || "";
  }
  if (part.dynamic) {
    if (!params[part.content]) {
      throw new TypeError(`Missing parameter: ${part.content}`);
    }
    return params[part.content];
  }
  return part.content.normalize().replace(/\?/g, "%3F").replace(/#/g, "%23").replace(/%5B/g, "[").replace(/%5D/g, "]");
}
function getSegment(segment, params) {
  const segmentPath = segment.map((part) => getParameter(part, params)).join("");
  return segmentPath ? "/" + segmentPath : "";
}
function getRouteGenerator(segments, addTrailingSlash) {
  return (params) => {
    const sanitizedParams = sanitizeParams(params);
    let trailing = "";
    if (addTrailingSlash === "always" && segments.length) {
      trailing = "/";
    }
    const path = segments.map((segment) => getSegment(segment, sanitizedParams)).join("") + trailing;
    return path || "/";
  };
}

function deserializeRouteData(rawRouteData) {
  return {
    route: rawRouteData.route,
    type: rawRouteData.type,
    pattern: new RegExp(rawRouteData.pattern),
    params: rawRouteData.params,
    component: rawRouteData.component,
    generate: getRouteGenerator(rawRouteData.segments, rawRouteData._meta.trailingSlash),
    pathname: rawRouteData.pathname || void 0,
    segments: rawRouteData.segments,
    prerender: rawRouteData.prerender,
    redirect: rawRouteData.redirect,
    redirectRoute: rawRouteData.redirectRoute ? deserializeRouteData(rawRouteData.redirectRoute) : void 0,
    fallbackRoutes: rawRouteData.fallbackRoutes.map((fallback) => {
      return deserializeRouteData(fallback);
    }),
    isIndex: rawRouteData.isIndex
  };
}

function deserializeManifest(serializedManifest) {
  const routes = [];
  for (const serializedRoute of serializedManifest.routes) {
    routes.push({
      ...serializedRoute,
      routeData: deserializeRouteData(serializedRoute.routeData)
    });
    const route = serializedRoute;
    route.routeData = deserializeRouteData(serializedRoute.routeData);
  }
  const assets = new Set(serializedManifest.assets);
  const componentMetadata = new Map(serializedManifest.componentMetadata);
  const inlinedScripts = new Map(serializedManifest.inlinedScripts);
  const clientDirectives = new Map(serializedManifest.clientDirectives);
  const serverIslandNameMap = new Map(serializedManifest.serverIslandNameMap);
  const key = decodeKey(serializedManifest.key);
  return {
    // in case user middleware exists, this no-op middleware will be reassigned (see plugin-ssr.ts)
    middleware() {
      return { onRequest: NOOP_MIDDLEWARE_FN };
    },
    ...serializedManifest,
    assets,
    componentMetadata,
    inlinedScripts,
    clientDirectives,
    routes,
    serverIslandNameMap,
    key
  };
}

const manifest = deserializeManifest({"hrefRoot":"file:///C:/Git/Clicom-site-2026/","adapterName":"","routes":[{"file":"file:///C:/Git/Clicom-site-2026/dist/404.html","links":[],"scripts":[],"styles":[],"routeData":{"route":"/404","isIndex":false,"type":"page","pattern":"^\\/404\\/?$","segments":[[{"content":"404","dynamic":false,"spread":false}]],"params":[],"component":"src/pages/404.astro","pathname":"/404","prerender":true,"fallbackRoutes":[],"_meta":{"trailingSlash":"ignore"}}},{"file":"file:///C:/Git/Clicom-site-2026/dist/apropos/index.html","links":[],"scripts":[],"styles":[],"routeData":{"route":"/apropos","isIndex":false,"type":"page","pattern":"^\\/apropos\\/?$","segments":[[{"content":"apropos","dynamic":false,"spread":false}]],"params":[],"component":"src/pages/apropos.astro","pathname":"/apropos","prerender":true,"fallbackRoutes":[],"_meta":{"trailingSlash":"ignore"}}},{"file":"file:///C:/Git/Clicom-site-2026/dist/blog/index.html","links":[],"scripts":[],"styles":[],"routeData":{"route":"/blog","isIndex":true,"type":"page","pattern":"^\\/blog\\/?$","segments":[[{"content":"blog","dynamic":false,"spread":false}]],"params":[],"component":"src/pages/blog/index.astro","pathname":"/blog","prerender":true,"fallbackRoutes":[],"_meta":{"trailingSlash":"ignore"}}},{"file":"file:///C:/Git/Clicom-site-2026/dist/contact/index.html","links":[],"scripts":[],"styles":[],"routeData":{"route":"/contact","isIndex":false,"type":"page","pattern":"^\\/contact\\/?$","segments":[[{"content":"contact","dynamic":false,"spread":false}]],"params":[],"component":"src/pages/contact.astro","pathname":"/contact","prerender":true,"fallbackRoutes":[],"_meta":{"trailingSlash":"ignore"}}},{"file":"file:///C:/Git/Clicom-site-2026/dist/cookies/index.html","links":[],"scripts":[],"styles":[],"routeData":{"route":"/cookies","isIndex":false,"type":"page","pattern":"^\\/cookies\\/?$","segments":[[{"content":"cookies","dynamic":false,"spread":false}]],"params":[],"component":"src/pages/cookies.astro","pathname":"/cookies","prerender":true,"fallbackRoutes":[],"_meta":{"trailingSlash":"ignore"}}},{"file":"file:///C:/Git/Clicom-site-2026/dist/de/index.html","links":[],"scripts":[],"styles":[],"routeData":{"route":"/de","isIndex":true,"type":"page","pattern":"^\\/de\\/?$","segments":[[{"content":"de","dynamic":false,"spread":false}]],"params":[],"component":"src/pages/de/index.astro","pathname":"/de","prerender":true,"fallbackRoutes":[],"_meta":{"trailingSlash":"ignore"}}},{"file":"file:///C:/Git/Clicom-site-2026/dist/en/index.html","links":[],"scripts":[],"styles":[],"routeData":{"route":"/en","isIndex":true,"type":"page","pattern":"^\\/en\\/?$","segments":[[{"content":"en","dynamic":false,"spread":false}]],"params":[],"component":"src/pages/en/index.astro","pathname":"/en","prerender":true,"fallbackRoutes":[],"_meta":{"trailingSlash":"ignore"}}},{"file":"file:///C:/Git/Clicom-site-2026/dist/mentions-legales/index.html","links":[],"scripts":[],"styles":[],"routeData":{"route":"/mentions-legales","isIndex":false,"type":"page","pattern":"^\\/mentions-legales\\/?$","segments":[[{"content":"mentions-legales","dynamic":false,"spread":false}]],"params":[],"component":"src/pages/mentions-legales.astro","pathname":"/mentions-legales","prerender":true,"fallbackRoutes":[],"_meta":{"trailingSlash":"ignore"}}},{"file":"file:///C:/Git/Clicom-site-2026/dist/politique-confidentialite/index.html","links":[],"scripts":[],"styles":[],"routeData":{"route":"/politique-confidentialite","isIndex":false,"type":"page","pattern":"^\\/politique-confidentialite\\/?$","segments":[[{"content":"politique-confidentialite","dynamic":false,"spread":false}]],"params":[],"component":"src/pages/politique-confidentialite.astro","pathname":"/politique-confidentialite","prerender":true,"fallbackRoutes":[],"_meta":{"trailingSlash":"ignore"}}},{"file":"file:///C:/Git/Clicom-site-2026/dist/realisations/index.html","links":[],"scripts":[],"styles":[],"routeData":{"route":"/realisations","isIndex":false,"type":"page","pattern":"^\\/realisations\\/?$","segments":[[{"content":"realisations","dynamic":false,"spread":false}]],"params":[],"component":"src/pages/realisations.astro","pathname":"/realisations","prerender":true,"fallbackRoutes":[],"_meta":{"trailingSlash":"ignore"}}},{"file":"file:///C:/Git/Clicom-site-2026/dist/services/index.html","links":[],"scripts":[],"styles":[],"routeData":{"route":"/services","isIndex":false,"type":"page","pattern":"^\\/services\\/?$","segments":[[{"content":"services","dynamic":false,"spread":false}]],"params":[],"component":"src/pages/services.astro","pathname":"/services","prerender":true,"fallbackRoutes":[],"_meta":{"trailingSlash":"ignore"}}},{"file":"file:///C:/Git/Clicom-site-2026/dist/sitemap.xml","links":[],"scripts":[],"styles":[],"routeData":{"route":"/sitemap.xml","isIndex":false,"type":"endpoint","pattern":"^\\/sitemap\\.xml\\/?$","segments":[[{"content":"sitemap.xml","dynamic":false,"spread":false}]],"params":[],"component":"src/pages/sitemap.xml.ts","pathname":"/sitemap.xml","prerender":true,"fallbackRoutes":[],"_meta":{"trailingSlash":"ignore"}}},{"file":"file:///C:/Git/Clicom-site-2026/dist/index.html","links":[],"scripts":[],"styles":[],"routeData":{"route":"/","isIndex":true,"type":"page","pattern":"^\\/$","segments":[],"params":[],"component":"src/pages/index.astro","pathname":"/","prerender":true,"fallbackRoutes":[],"_meta":{"trailingSlash":"ignore"}}}],"site":"https://clicom.ch","base":"/","trailingSlash":"ignore","compressHTML":true,"componentMetadata":[["\u0000astro:content",{"propagation":"in-tree","containsHead":false}],["C:/Git/Clicom-site-2026/src/pages/blog/[slug].astro",{"propagation":"in-tree","containsHead":true}],["\u0000@astro-page:src/pages/blog/[slug]@_@astro",{"propagation":"in-tree","containsHead":false}],["C:/Git/Clicom-site-2026/src/pages/blog/index.astro",{"propagation":"in-tree","containsHead":true}],["\u0000@astro-page:src/pages/blog/index@_@astro",{"propagation":"in-tree","containsHead":false}],["C:/Git/Clicom-site-2026/src/pages/sitemap.xml.ts",{"propagation":"in-tree","containsHead":false}],["\u0000@astro-page:src/pages/sitemap.xml@_@ts",{"propagation":"in-tree","containsHead":false}],["C:/Git/Clicom-site-2026/src/pages/404.astro",{"propagation":"none","containsHead":true}],["C:/Git/Clicom-site-2026/src/pages/apropos.astro",{"propagation":"none","containsHead":true}],["C:/Git/Clicom-site-2026/src/pages/contact.astro",{"propagation":"none","containsHead":true}],["C:/Git/Clicom-site-2026/src/pages/cookies.astro",{"propagation":"none","containsHead":true}],["C:/Git/Clicom-site-2026/src/pages/de/index.astro",{"propagation":"none","containsHead":true}],["C:/Git/Clicom-site-2026/src/pages/en/index.astro",{"propagation":"none","containsHead":true}],["C:/Git/Clicom-site-2026/src/pages/index.astro",{"propagation":"none","containsHead":true}],["C:/Git/Clicom-site-2026/src/pages/mentions-legales.astro",{"propagation":"none","containsHead":true}],["C:/Git/Clicom-site-2026/src/pages/politique-confidentialite.astro",{"propagation":"none","containsHead":true}],["C:/Git/Clicom-site-2026/src/pages/realisations.astro",{"propagation":"none","containsHead":true}],["C:/Git/Clicom-site-2026/src/pages/realisations/[slug].astro",{"propagation":"none","containsHead":true}],["C:/Git/Clicom-site-2026/src/pages/services.astro",{"propagation":"none","containsHead":true}]],"renderers":[],"clientDirectives":[["idle","(()=>{var l=(o,t)=>{let i=async()=>{await(await o())()},e=typeof t.value==\"object\"?t.value:void 0,s={timeout:e==null?void 0:e.timeout};\"requestIdleCallback\"in window?window.requestIdleCallback(i,s):setTimeout(i,s.timeout||200)};(self.Astro||(self.Astro={})).idle=l;window.dispatchEvent(new Event(\"astro:idle\"));})();"],["load","(()=>{var e=async t=>{await(await t())()};(self.Astro||(self.Astro={})).load=e;window.dispatchEvent(new Event(\"astro:load\"));})();"],["media","(()=>{var s=(i,t)=>{let a=async()=>{await(await i())()};if(t.value){let e=matchMedia(t.value);e.matches?a():e.addEventListener(\"change\",a,{once:!0})}};(self.Astro||(self.Astro={})).media=s;window.dispatchEvent(new Event(\"astro:media\"));})();"],["only","(()=>{var e=async t=>{await(await t())()};(self.Astro||(self.Astro={})).only=e;window.dispatchEvent(new Event(\"astro:only\"));})();"],["visible","(()=>{var l=(s,i,o)=>{let r=async()=>{await(await s())()},t=typeof i.value==\"object\"?i.value:void 0,c={rootMargin:t==null?void 0:t.rootMargin},n=new IntersectionObserver(e=>{for(let a of e)if(a.isIntersecting){n.disconnect(),r();break}},c);for(let e of o.children)n.observe(e)};(self.Astro||(self.Astro={})).visible=l;window.dispatchEvent(new Event(\"astro:visible\"));})();"]],"entryModules":{"\u0000noop-middleware":"_noop-middleware.mjs","\u0000@astro-page:src/pages/404@_@astro":"pages/404.astro.mjs","\u0000@astro-page:src/pages/apropos@_@astro":"pages/apropos.astro.mjs","\u0000@astro-page:src/pages/blog/[slug]@_@astro":"pages/blog/_slug_.astro.mjs","\u0000@astro-page:src/pages/blog/index@_@astro":"pages/blog.astro.mjs","\u0000@astro-page:src/pages/contact@_@astro":"pages/contact.astro.mjs","\u0000@astro-page:src/pages/cookies@_@astro":"pages/cookies.astro.mjs","\u0000@astro-page:src/pages/de/index@_@astro":"pages/de.astro.mjs","\u0000@astro-page:src/pages/en/index@_@astro":"pages/en.astro.mjs","\u0000@astro-page:src/pages/mentions-legales@_@astro":"pages/mentions-legales.astro.mjs","\u0000@astro-page:src/pages/politique-confidentialite@_@astro":"pages/politique-confidentialite.astro.mjs","\u0000@astro-page:src/pages/realisations/[slug]@_@astro":"pages/realisations/_slug_.astro.mjs","\u0000@astro-page:src/pages/realisations@_@astro":"pages/realisations.astro.mjs","\u0000@astro-page:src/pages/services@_@astro":"pages/services.astro.mjs","\u0000@astro-page:src/pages/sitemap.xml@_@ts":"pages/sitemap.xml.astro.mjs","\u0000@astro-page:src/pages/index@_@astro":"pages/index.astro.mjs","\u0000@astro-renderers":"renderers.mjs","\u0000@astrojs-manifest":"manifest_CZLaGIC2.mjs","C:/Git/Clicom-site-2026/src/content/blog/seo-local-suisse.md?astroContentCollectionEntry=true":"chunks/seo-local-suisse_Cf75jOEg.mjs","C:/Git/Clicom-site-2026/src/content/blog/vitesse-site-fait-vendre.md?astroContentCollectionEntry=true":"chunks/vitesse-site-fait-vendre_BTntVLd1.mjs","C:/Git/Clicom-site-2026/src/content/blog/seo-local-suisse.md?astroPropagatedAssets":"chunks/seo-local-suisse_CXLRq6jt.mjs","C:/Git/Clicom-site-2026/src/content/blog/vitesse-site-fait-vendre.md?astroPropagatedAssets":"chunks/vitesse-site-fait-vendre_orXd3w1l.mjs","\u0000astro:asset-imports":"chunks/_astro_asset-imports_D9aVaOQr.mjs","\u0000astro:data-layer-content":"chunks/_astro_data-layer-content_BcEe_9wP.mjs","C:/Git/Clicom-site-2026/src/content/blog/seo-local-suisse.md":"chunks/seo-local-suisse_CyBaqHMC.mjs","C:/Git/Clicom-site-2026/src/content/blog/vitesse-site-fait-vendre.md":"chunks/vitesse-site-fait-vendre_B7hzzjlY.mjs","astro:scripts/before-hydration.js":""},"inlinedScripts":[],"assets":["/file:///C:/Git/Clicom-site-2026/dist/404.html","/file:///C:/Git/Clicom-site-2026/dist/apropos/index.html","/file:///C:/Git/Clicom-site-2026/dist/blog/index.html","/file:///C:/Git/Clicom-site-2026/dist/contact/index.html","/file:///C:/Git/Clicom-site-2026/dist/cookies/index.html","/file:///C:/Git/Clicom-site-2026/dist/de/index.html","/file:///C:/Git/Clicom-site-2026/dist/en/index.html","/file:///C:/Git/Clicom-site-2026/dist/mentions-legales/index.html","/file:///C:/Git/Clicom-site-2026/dist/politique-confidentialite/index.html","/file:///C:/Git/Clicom-site-2026/dist/realisations/index.html","/file:///C:/Git/Clicom-site-2026/dist/services/index.html","/file:///C:/Git/Clicom-site-2026/dist/sitemap.xml","/file:///C:/Git/Clicom-site-2026/dist/index.html"],"buildFormat":"directory","checkOrigin":false,"serverIslandNameMap":[],"key":"TmliHb6RmP6dq4ko7JCF6SsHfXi3LsLEB0HgMJMCx4Y=","experimentalEnvGetSecretEnabled":false});

export { manifest };
