<template>
  <app-layout title="Create">
    <template #header>
      <div class="flex flex-row">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Write Post
        </h2>
      </div>
      <!-- Form -->
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div>
              <div class="md:grid md:grid-cols-6 md:gap-6">
                <div class="md:col-span-12 content-center">
                  <div
                    class="
                      text-white
                      px-6
                      py-4
                      border-0
                      rounded
                      relative
                      mb-4
                      bg-blue-500
                    "
                  >
                    <span class="text-xl inline-block mr-5 align-middle">
                    </span>
                    <span class="inline-block align-middle mr-8"> </span>
                  </div>

                  <div class="container my-10 sm:px-0">
                    <h2
                      class="text-3xl font-medium leading-6 text-gray-900 mx-32"
                    >
                      Blog Post
                    </h2>
                  </div>
                </div>
                <!-- Form component -->
                <div class="mt-5 md:mt-0 md:col-span-6">
                  <form action="{{ route('posts.store') }}" method="POST">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                      <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <div class="grid grid-cols-3 gap-6">
                          <div class="col-span-3 sm:col-span-2">
                            <label
                              for="title"
                              class="block text-sm font-medium text-gray-700"
                            >
                              Title
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                              <input
                                v-model="form.title"
                                type="text"
                                class="
                                  focus:ring-indigo-500 focus:border-indigo-500
                                  flex-1
                                  block
                                  w-full
                                  rounded-none rounded-
                                  r-md
                                  sm:text-sm
                                  border-gray-300
                                "
                                placeholder="Write title blog post"
                                required
                              />
                              <div v-if="errors.title" class="text-red-500">
                                {{ errors.title }}
                              </div>
                            </div>
                          </div>
                        </div>

                        <div>
                          <label
                            for="content"
                            class="block text-sm font-medium text-gray-700"
                          >
                            Blog Content
                          </label>
                          <div class="mt-1">
                            <!-- <div v-if="form.errors.content">{{ form.errors.content }}</div> -->
                            <textarea
                              v-model="form.content"
                              rows="3"
                              class="
                                shadow-sm
                                focus:ring-indigo-500 focus:border-indigo-500
                                mt-1
                                block
                                w-full
                                sm:text-sm
                                border border-gray-300
                                rounded-md
                              "
                              placeholder="Write blog content"
                              required
                            ></textarea>
                            <div v-if="errors.content" class="text-red-500">
                              {{ errors.content }}
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button
                          type="submit"
                          class="
                            inline-flex
                            justify-center
                            py-2
                            px-4
                            border border-transparent
                            shadow-sm
                            text-sm
                            font-medium
                            rounded-md
                            text-white
                            bg-red-500
                            hover:bg-red-700
                            focus:outline-none
                            focus:ring-2
                            focus:ring-offset-2
                            focus:ring-red-600
                          "
                        >
                          Cancel
                        </button>
                        <button
                          @click.prevent="storePost"
                          type="submit"
                          class="
                            inline-flex
                            justify-center
                            py-2
                            px-4
                            mx-2
                            border border-transparent
                            shadow-sm
                            text-sm
                            font-medium
                            rounded-md
                            text-white
                            bg-indigo-600
                            hover:bg-indigo-700
                            focus:outline-none
                            focus:ring-2
                            focus:ring-offset-2
                            focus:ring-indigo-500
                          "
                        >
                          Save
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="hidden sm:block" aria-hidden="true">
              <div class="py-5">
                <div class="border-t border-gray-200"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";

import JetNavLink from "@/Jetstream/NavLink.vue";

export default defineComponent({
  components: {
    AppLayout,
    JetNavLink,
  },
  globalInjection: true,
  props: ["errors", "flash"],
  data() {
    return {
      form: {
        title: "",
        content: "",
      },
    };
  },
  methods: {
    storePost() {
      this.$inertia.post("/posts", this.form, {
        _method: "put",
        onError: (errors) => {
          console.log(errors);
        },
      });
    },
  },
});
</script>
