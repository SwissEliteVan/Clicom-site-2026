import { defineCollection, z } from "astro:content";

const blog = defineCollection({
  type: "content",
  schema: z.object({
    title: z.string(),
    description: z.string(),
    pubDate: z.string(),
    author: z.string(),
    category: z.enum([
      "visibilite",
      "reseaux-sociaux",
      "tendances-web",
      "guides-pratiques"
    ]).default("visibilite"),
  }),
});

export const collections = { blog };
