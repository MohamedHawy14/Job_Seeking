<x-layout>
<x-card
                    class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
                >
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Edit a Job AD
                        </h2>
                        <p class="mb-4">Edit a Job to find a developer</p>
                    </header>

                    <form action="/listings/{{$listing->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label
                                for="company"
                                class="inline-block text-lg mb-2"
                                >Company Name</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="company"
                                value="{{$listing->company}}"
                            />
                            @error('company')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="title" class="inline-block text-lg mb-2"
                                >Job Title(Ar)</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="titleAr"
                                value="{{$listing->titleAr}}"
                                placeholder="Example: Senior Laravel Developer"
                            />
                            @error('titleAr')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="title" class="inline-block text-lg mb-2"
                                >Job Title(En)</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="titleEn"
                                value="{{$listing->titleEn}}"
                                placeholder="Example: Senior Laravel Developer"
                            />
                            @error('titleEn')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="location"
                                class="inline-block text-lg mb-2"
                                >Job Location</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="location"
                                value="{{$listing->location}}"
                                placeholder="Example: Remote, Boston MA, etc"
                            />
                            @error('location')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror


                        </div>

                        <div class="mb-6">
                            <label for="email" class="inline-block text-lg mb-2"
                                >Contact Email</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                value="{{$listing->email}}"
                                name="email"
                            />
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="website"
                                class="inline-block text-lg mb-2"
                            >
                                Website/Application URL
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="website"
                                value="{{$listing->website}}"
                            />
                            @error('website')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="tags" class="inline-block text-lg mb-2">
                                Tags (space Separated)
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="tags"
                                value="{{$listing->tags}}"
                                placeholder="Example: Laravel, Backend, Postgres, etc"
                            />
                            @error('tags')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="logo" class="inline-block text-lg mb-2">
                                Company Logo
                            </label>
                            <input
                                type="file"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="logo"
                            />
                            <img class="w-48 mr-6 mb-6"
                            src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}" alt="" />
                            @error('logo')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="descriptionAr"
                                class="inline-block text-lg mb-2"
                            >
                                Job Description(Ar)
                            </label>
                            <textarea
                                class="border border-gray-200 rounded p-2 w-full"
                                name="descriptionAr"
                                rows="10"
                                placeholder="Include tasks, requirements, salary, etc"

                            >{{$listing->descriptionAr}}</textarea>
                            @error('descriptionAr')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="descriptionEn"
                                class="inline-block text-lg mb-2"
                            >
                                Job Description(En)
                            </label>
                            <textarea
                                class="border border-gray-200 rounded p-2 w-full"
                                name="descriptionEn"
                                rows="10"
                                placeholder="Include tasks, requirements, salary, etc"
                            >  {{$listing->descriptionEn}}</textarea>
                            @error('descriptionEn')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>


                        <div class="mb-6">
                            <button
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Update Job
                            </button>

                            <a href="/" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
</x-card>
</x-layout>
