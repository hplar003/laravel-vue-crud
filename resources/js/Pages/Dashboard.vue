<template>
  <app-layout title="Dashboard">
    <template #header>
      <div class="flex flex-row">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Dashboard
        </h2>
      </div>
    </template>

    <div v-if="flash" class="text-blue-500">
      <span class="text-xl inline-block mr-5 align-middle"> </span>
      <span class="inline-block align-middle mr-8">
        {{ flash.message }}
      </span>
    </div>


    <!-- Table -->


    <div class="container flex flex-col mx-20">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div
          class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="w-full  ">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  ID
                </th>
                <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Title
                </th>
                 <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Edit
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="post in posts" :key="post.id">
                <td class="px-6 py-4 ">
                    {{ post.id }}
                </td>
                <td class="px-6 py-4 ">
                   {{ post.title }} 
                </td>
                <td class="px-6 py-4  text-sm font-medium">
                  <!-- <jet-nav-link  class="text-indigo-600 hover:text-indigo-900"
                  :href="/posts/'{{post.id}}'/edit"> Edit </jet-nav-link> </td> -->
                </td>
                  <Link :href="`posts/${ post.id }/edit`" class="text-indigo-600 hover:text-indigo-900">Edit</Link>
                

              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
import Form from "./Post/Form.vue";
import JetNavLink from "@/Jetstream/NavLink.vue";
import { Link } from '@inertiajs/inertia-vue3'


export default defineComponent({
  components: {
    AppLayout,
    Welcome,
    Form,
    JetNavLink,
    Link,
  },
  globalInjection: true,
  props: ["errors", "flash", "posts"],
});
</script>
