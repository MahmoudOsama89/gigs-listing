<x-layout>
    <x-card class="p-10">
        <header>
                        <h1
                            class="text-3xl text-center font-bold my-6 uppercase"
                        >
                            Manage Gigs
                        </h1>
                    </header>

                        @unless(count($listings) == 0)
                        
                    <table class="w-full table-auto rounded-sm">
                        <tbody>
                            @foreach($listings as $key => $listing)
                                
                            
                        
                            <tr class="border-gray-300">
                                <td
                                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                                >
                                    <a href="show.html">
                                        {{$listing->title}}
                                    </a>
                                </td>
                                <td
                                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                                >
                                    <a
                                        href="/listings/{{$listing->id}}/edit"
                                        class="text-blue-400 px-6 py-2 rounded-xl"
                                        ><i
                                            class="fa-solid fa-pen-to-square"
                                        ></i>
                                        Edit</a
                                    >
                                </td>
                                <td
                                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                                >
                                    <form action="/listings/{{$listing->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                        <button class="text-red-600" type="submit">
                                            <i
                                                class="fa-solid fa-trash-can"
                                            ></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                    </table>
                            @else
                            <h1>There is no listings</h1>
                        @endunless
                            
                        
    </x-card>
</x-layout>