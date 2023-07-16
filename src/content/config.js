import { z, defineCollection } from "astro:content";

const postsCollection = defineCollection({
  schema: z.object({
    title: z.string().nullable(),
    publish_date: z.optional(z.date()),
  }),
});

export const collections = {
  posts: postsCollection,
};
