<dialog class="transition-all duration-400 ease-out opacity-100 translate-y-0 border-2 border-green-600 starting:translate-y-10 starting:opacity-0 space-y-5 w-120 my-60 mx-auto bg-black rounded-2xl p-5">
    <div class="flex flex-row justify-center items-center">
        <h1 class="text-white flex-1 font-bold text-[1.3rem]">Send an email</h1>
        <button class="text-white font-bold p-1 w-15 rounded-lg liquid-panel border-2 border-black cursor-pointer hover:scale-110 hover:bg-green-400 transition-all duration-100 ease-out">x</button>
    </div>
    <form class="flex flex-col gap-5" action="{{ route('contact.input') }}" method="POST">
        @csrf
        <input class="focus:border-3 focus:border-green-500 rounded-md liquid-panel text-white p-3" name="email" type="email" placeholder="Enter your email" required>
        <textarea class="focus:border-3 focus:border-green-500 liquid-panel rounded-md text-white p-3 h-40 max-h-40 min-h-40" name="message" placeholder="Write your message..." required></textarea>
        <button class="liquid-panel cursor-pointer  rounded-md h-10 w-50 text-white mx-auto font-semibold" type="submit">Send</button>
    </form>
</dialog>