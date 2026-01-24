import { c as createComponent, m as maybeRenderHead, u as unescapeHTML, a as renderTemplate } from './astro/server_BbL4JxFn.mjs';
import 'kleur/colors';
import 'clsx';

const html = "<p>Un site rapide n’est pas un luxe : c’est un levier de conversion. Chaque seconde perdue\r\nréduit la confiance, augmente le taux de rebond et coûte des demandes entrantes.</p>\n<h2 id=\"ce-que-la-vitesse-change-vraiment\">Ce que la vitesse change vraiment</h2>\n<ul>\n<li><strong>Expérience utilisateur</strong> : navigation fluide, parcours sans friction.</li>\n<li><strong>SEO</strong> : Google favorise les pages stables et rapides.</li>\n<li><strong>Perception de marque</strong> : un site rapide inspire confiance et sérieux.</li>\n</ul>\n<h2 id=\"comment-clic-com-accélère-un-site\">Comment Clic COM accélère un site</h2>\n<ol>\n<li>Audit Core Web Vitals et poids des pages.</li>\n<li>Nettoyage des scripts inutiles.</li>\n<li>Optimisation des images et des polices.</li>\n<li>Mise en cache efficace pour l’hébergement statique.</li>\n</ol>\n<p>Un site rapide vend plus parce qu’il respecte l’attention de vos clients.</p>";

				const frontmatter = {"title":"Pourquoi la vitesse d'un site fait vendre","description":"Comprendre l'impact direct de la vitesse sur la conversion et le SEO.","pubDate":"2024-01-10","author":"Clic COM","category":"tendances-web"};
				const file = "C:/Git/Clicom-site-2026/src/content/blog/vitesse-site-fait-vendre.md";
				const url = undefined;
				function rawContent() {
					return "Un site rapide n'est pas un luxe : c'est un levier de conversion. Chaque seconde perdue\r\nréduit la confiance, augmente le taux de rebond et coûte des demandes entrantes.\r\n\r\n## Ce que la vitesse change vraiment\r\n\r\n- **Expérience utilisateur** : navigation fluide, parcours sans friction.\r\n- **SEO** : Google favorise les pages stables et rapides.\r\n- **Perception de marque** : un site rapide inspire confiance et sérieux.\r\n\r\n## Comment Clic COM accélère un site\r\n\r\n1. Audit Core Web Vitals et poids des pages.\r\n2. Nettoyage des scripts inutiles.\r\n3. Optimisation des images et des polices.\r\n4. Mise en cache efficace pour l'hébergement statique.\r\n\r\nUn site rapide vend plus parce qu'il respecte l'attention de vos clients.\r\n";
				}
				function compiledContent() {
					return html;
				}
				function getHeadings() {
					return [{"depth":2,"slug":"ce-que-la-vitesse-change-vraiment","text":"Ce que la vitesse change vraiment"},{"depth":2,"slug":"comment-clic-com-accélère-un-site","text":"Comment Clic COM accélère un site"}];
				}

				const Content = createComponent((result, _props, slots) => {
					const { layout, ...content } = frontmatter;
					content.file = file;
					content.url = url;

					return renderTemplate`${maybeRenderHead()}${unescapeHTML(html)}`;
				});

export { Content, compiledContent, Content as default, file, frontmatter, getHeadings, rawContent, url };
