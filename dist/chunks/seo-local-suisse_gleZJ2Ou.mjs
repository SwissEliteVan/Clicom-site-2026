import { c as createComponent, m as maybeRenderHead, u as unescapeHTML, a as renderTemplate } from './astro/server_BbL4JxFn.mjs';
import 'kleur/colors';
import 'clsx';

const html = "<p>Le SEO local est une stratégie de proximité. En Suisse, la concurrence est forte : il\r\nfaut prioriser les actions utiles, pas les effets de manche.</p>\n<h2 id=\"les-piliers-indispensables\">Les piliers indispensables</h2>\n<ul>\n<li><strong>Google Business Profile propre</strong> (catégories, photos, avis).</li>\n<li><strong>Pages locales dédiées</strong> avec un message clair.</li>\n<li><strong>Contenu utile</strong> pour répondre aux questions récurrentes.</li>\n</ul>\n<h2 id=\"ce-que-nous-mettons-en-place\">Ce que nous mettons en place</h2>\n<ol>\n<li>Audit de la présence locale actuelle.</li>\n<li>Optimisation des fiches et du contenu.</li>\n<li>Suivi des positions et ajustements réguliers.</li>\n</ol>\n<p>L’objectif est simple : être visible là où vos clients vous cherchent réellement.</p>";

				const frontmatter = {"title":"SEO local en Suisse : ce qui marche vraiment","description":"Les actions concrètes qui améliorent votre visibilité locale sans promesses irréalistes.","pubDate":"2024-02-05","author":"Clic COM","category":"visibilite"};
				const file = "C:/Git/Clicom-site-2026/src/content/blog/seo-local-suisse.md";
				const url = undefined;
				function rawContent() {
					return "Le SEO local est une stratégie de proximité. En Suisse, la concurrence est forte : il\r\nfaut prioriser les actions utiles, pas les effets de manche.\r\n\r\n## Les piliers indispensables\r\n\r\n- **Google Business Profile propre** (catégories, photos, avis).\r\n- **Pages locales dédiées** avec un message clair.\r\n- **Contenu utile** pour répondre aux questions récurrentes.\r\n\r\n## Ce que nous mettons en place\r\n\r\n1. Audit de la présence locale actuelle.\r\n2. Optimisation des fiches et du contenu.\r\n3. Suivi des positions et ajustements réguliers.\r\n\r\nL'objectif est simple : être visible là où vos clients vous cherchent réellement.\r\n";
				}
				function compiledContent() {
					return html;
				}
				function getHeadings() {
					return [{"depth":2,"slug":"les-piliers-indispensables","text":"Les piliers indispensables"},{"depth":2,"slug":"ce-que-nous-mettons-en-place","text":"Ce que nous mettons en place"}];
				}

				const Content = createComponent((result, _props, slots) => {
					const { layout, ...content } = frontmatter;
					content.file = file;
					content.url = url;

					return renderTemplate`${maybeRenderHead()}${unescapeHTML(html)}`;
				});

export { Content, compiledContent, Content as default, file, frontmatter, getHeadings, rawContent, url };
