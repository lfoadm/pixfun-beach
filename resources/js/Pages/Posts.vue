<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';
import MainNavLayout from '@/Layouts/MainNavLayout.vue';
import CreatePostBox from '@/Components/CreatePostBox.vue';
import Post from '@/Components/Post.vue';

import Magnify from 'vue-material-design-icons/Magnify.vue'
// import TelevisionPlay from 'vue-material-design-icons/TelevisionPlay.vue'
import StoreFrontOutline from 'vue-material-design-icons/StoreFrontOutline.vue'
import AccountGroup from 'vue-material-design-icons/AccountGroup.vue'
import AccountMultiple from 'vue-material-design-icons/AccountMultiple.vue'
import Flag from 'vue-material-design-icons/Flag.vue'
import DotsGrid from 'vue-material-design-icons/DotsGrid.vue'
import ClockTimeTwoOutline from 'vue-material-design-icons/ClockTimeTwoOutline.vue'
import Restore from 'vue-material-design-icons/Restore.vue'
import VideoImage from 'vue-material-design-icons/VideoImage.vue'
import DotsHorizontal from 'vue-material-design-icons/DotsHorizontal.vue'

defineProps({ posts: Object })

const user = usePage().props.auth.user


</script>

<template>

    <Head title="Posts" />

    <MainNavLayout>
        <div class="fixed w-full h-[100%] bg-[#f1f2f5]">
            <div
                class="grid grid-rows-3 grid-flow-col w-full max-w-[1600px] mt-[56px] h-[calc(100%-56px)] mx-auto px-4">

                <div id="LeftSection" class="xl:w-[345px] lg:block hidden">
                    <div class="pt-4 max-w-[320px] pr-4">
                        <Link 
                            :href="route('user.show', { id: user.id })"
                            class="flex items-center justify-start w-full cursor-pointer hover:bg-[#e5e6e9] p-2 rounded-md"
                        >
                        <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]"
                            :src="user.image" alt="">
                        <div class="text-[15px] text-gray-800 font-extrabold pl-3">{{ user.name }}</div>
                        </Link>
                        <button
                            class="flex items-center justify-start w-full cursor-pointer hover:bg-[#e5e6e9] px-2 py-1.5 rounded-md">
                            <AccountMultiple :size="40" fillColor="#5bd7c6" />
                            <div class="text-[15px] text-gray-800 font-extrabold pl-3">Amigos</div>
                        </button>
                        <button
                            class="flex items-center justify-start w-full cursor-pointer hover:bg-[#e5e6e9] px-2 py-1.5 rounded-md">
                            <Flag :size="40" fillColor="#5b57c6" />
                            <div class="text-[15px] text-gray-800 font-extrabold pl-3">Páginas</div>
                        </button>
                        <button
                            class="flex items-center justify-start w-full cursor-pointer hover:bg-[#e5e6e9] px-2 py-1.5 rounded-md">
                            <ClockTimeTwoOutline :size="40" fillColor="#dba7c6" />
                            <div class="text-[15px] text-gray-800 font-extrabold pl-3">Recentes</div>
                        </button>
                        <button
                            class="flex items-center justify-start w-full cursor-pointer hover:bg-[#e5e6e9] px-2 py-1.5 rounded-md">
                            <AccountGroup :size="40" fillColor="#5bda86" />
                            <div class="text-[15px] text-gray-800 font-extrabold pl-3">Grupos</div>
                        </button>
                        <button
                            class="flex items-center justify-start w-full cursor-pointer hover:bg-[#e5e6e9] px-2 py-1.5 rounded-md">
                            <StoreFrontOutline :size="40" fillColor="#a1dec6" />
                            <div class="text-[15px] text-gray-800 font-extrabold pl-3">Lojas</div>
                        </button>
                        <button
                            class="flex items-center justify-start w-full cursor-pointer hover:bg-[#e5e6e9] px-2 py-1.5 rounded-md">
                            <Restore :size="40" fillColor="#f5821f" />
                            <div class="text-[15px] text-gray-800 font-extrabold pl-3">Recuperar</div>
                        </button>
                    </div>
                </div>

                <div id="PostsSection" class="row-span-6 max-w-[600px] lg:mx-0 mx-auto overflow-auto">
                    <CreatePostBox 
                        :image="user.image"
                        :placeholder="'Poste algo engraçado ' + user.name"
                    />

                    <div v-for="post in posts.data" :key="post">
                        <Post :user="post.user" :post="post" :comments="post.comments" />
                    </div>
                </div>

                <div id="RightSection" class="pl-4 md:block hidden">
                    <div class="max-w-[340px] min-w-[250px] mx-auto pt-4">
                        <div class="flex items-center justify-between border-b border-b-gray-300">
                            <div class="font-semibold">Contatos</div>
                            <div class="flex items-center">
                                <div class="p-1 hover:bg-gray-300 rounded-full cursor-pointer">
                                    <VideoImage :size="23" fillColor="#050505" />
                                </div>
                                <div class="p-1 hover:bg-gray-300 rounded-full cursor-pointer">
                                    <Magnify :size="23" fillColor="#050505" />
                                </div>
                                <div class="p-1 hover:bg-gray-300 rounded-full cursor-pointer">
                                    <DotsHorizontal :size="23" fillColor="#050505" />
                                </div>
                            </div>
                        </div>
                        <div class="h-[calc(100vh-115px)] overflow-auto pt-2">
                            <div class="flex items-center justify-start cursor-pointer hover:bg-[#e5e6e9] py-2 rounded-md">
                                <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]"
                                    src="https://picsum.photos/id/146/300/320" alt="">
                                <div class="text-[15px] text-gray-800 font-bold pl-3">Carolina Mendonca</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MainNavLayout>

</template>
