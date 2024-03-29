import { z, defineCollection } from "astro:content";

const postsCollection = defineCollection({
  type: "content",
  schema: z.object({
    title: z.string().nullable(),
    publish_date: z.optional(z.date()),
    date: z.optional(z.date()),
    tags: z.optional(z.array(z.string())),
  }),
});

export const collections = {
  posts: postsCollection,
};
