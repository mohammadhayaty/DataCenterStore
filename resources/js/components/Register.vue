<script setup>
import { ref } from 'vue';
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore();
const form = ref({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

</script>
<template>
  <div>


    <div class="container ">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-lg-5">
                <div class="card-custom-3">
                    <h1 class="title-custom-1 text-center mb-4 pb-4 border-bottom">ایجاد حساب کاربری</h1>


      <form class="space-y-6" @submit.prevent="authStore.handleRegister(form)">

                         <div class="mb-3">
                            <label for="name" class="form-label">نام</label>
                            <input type="text" value="" id="name" name="name" v-model="form.name" class="form-control" required="" aria-describedby="invalid-name">
                            <div v-if="authStore.errors.name" class="flex">
                  <span class="alert alert-danger text-red-400 text-sm m-2 p-2">{{
                    authStore.errors.name[0]
                  }}</span>
                </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">ایمیل</label>
                            <input type="email" value="" id="email" name="email" v-model="form.email" autocomplete="email"  required="" class="form-control  ">
                            <div v-if="authStore.errors.email" class="flex">
                              <div v-if="authStore.errors.email==`The email has already been taken.`">
                                <span class=" alert alert-danger text-red-400 text-sm m-2 p-2">یک حساب کاربری با این ایمل قبلا ایجاد شده است!</span>
                              </div>
                              
                  <!-- <span class=" alert alert-danger text-red-400 text-sm m-2 p-2">{{
                    authStore.errors.email[0]
                  }}</span> -->
                </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">رمز عبور </label>
                            <input type="password" id="password" name="password" v-model="form.password"  required="" class="form-control  ">
                            <div v-if="authStore.errors.password" class="flex">
                              <div v-if="authStore.errors.password==`The password field must be at least 8 characters.`">
                                <span class=" alert alert-danger text-red-400 text-sm m-2 p-2">رمز عبور حداقل باید 8 کاراکتر داشته باشد.</span>
                              </div>
                              <div v-if="authStore.errors.password==`The password field confirmation does not match.`|| authStore.errors.password==`The password field confirmation does not match.`">
                                <span class=" alert alert-danger text-red-400 text-sm m-2 p-2">رمزعبور با تاییدرمزعبور مطابقت ندارد!</span>
                              </div>
                              
                  <!-- <span v-else class="alert alert-danger text-red-400 text-sm m-2 p-2">{{
                    authStore.errors.password[0]
                  }}</span> -->
                </div>
                        </div>


                        <div class="mb-3">
                            <label for="password" class="form-label">تایید رمز عبور</label>
                            <input type="password" id="password" name="password" v-model="form.password_confirmation"  required="" class="form-control  ">
                            
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-success" type="submit">ایجاد حساب</button>
                        </div>
                    </form>
                     از قبل حساب کاربری دارید؟  
                      <router-link to="/login" class="text-primary text-decoration-none"> ورود به حساب </router-link>


                    </div>
            </div>

        </div>
    </div>




 



  </div> 



</template>