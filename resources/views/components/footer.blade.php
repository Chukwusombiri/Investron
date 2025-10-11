<div class="pt-16 md:pt-24">
    <div class="w-full px-6 md:px-12">
        <div class="flex flex-col">
            {{-- subscribe call to action --}}
            <div class="w-full flex md:justify-between items-center flex-wrap border-b border-gray-300 pb-10">
                <div class="w-full md:w-1/2 mb-6 md:mb-0">
                    <div class="max-w-sm flex flex-col">
                        <h3 class="sedan-regular-bold text-2xl md:text-4xl mb-5">
                            Newletter
                        </h3>
                        <p class="futura-book text-md">
                            Sign up for our weekly non-boring newsletter about money, markets, and more.
                        </p>
                    </div>                    
                </div>
                <div class="w-full md:w-1/2 flex flex-col">                    
                    @livewire('subscribe')
                    <p class="futura-light text-xs max-w-sm">
                        By providing your email, you are consenting to receive communications from {{config('app.name')}} Media Inc. Visit our Privacy Policy for more info, or contact us at {{config('mail.mainTo.address')}} or {{config('app.company.address')}}.
                    </p>
                </div>
            </div>
            {{-- footer items --}}
            <div class="w-full py-10 border-b border-gray-300">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 justify-center">
                    {{-- single --}}
                    <div class="">
                        <p class="futura-medium text-md mb-2">Our company</p>
                        <ul class="list-style-none space-y-2">
                            <li class="futura-book text-sm"><a href="{{route('about')}}">About us</a></li>
                            <li class="futura-book text-sm"><a href="{{route('about').'#team'}}">Our team</a></li>
                            <li class="futura-book text-sm"><a href="{{route('reviews')}}">Client review</a></li>
                            <li class="futura-book text-sm"><a href="{{route('knowledge').'#faqs'}}">FAQs</a></li>
                        </ul>
                    </div>
                    {{-- single --}}
                    <div class="">
                        <p class="futura-medium text-md mb-2">Products</p>
                        <ul class="list-style-none space-y-2">
                            <li class="futura-book text-sm"><a href="{{route('managedInvesting')}}">Managed investing</a></li>
                            <li class="futura-book text-sm"><a href="{{route('pricing').'#Core'}}">Core</a></li>
                            <li class="futura-book text-sm"><a href="{{route('pricing').'#Premium'}}">Premium</a></li>
                            <li class="futura-book text-sm"><a href="{{route('pricing').'#Generation'}}">Generation</a></li>
                        </ul>
                    </div>
                    {{-- single --}}
                    <div class="">
                        <p class="futura-medium text-md mb-2">Legal</p>
                        <ul class="list-style-none space-y-2">
                            <li class="futura-book text-sm"><a href="{{route('policy.show')}}">Privacy policy</a></li>
                            <li class="futura-book text-sm"><a href="{{route('terms.show')}}">Terms of use</a></li>
                        </ul>
                    </div>                    
                    {{-- single --}}
                    <div class="col-span-2 md:col-span-2 lg:col-span-2">
                        <h5 class="futura-medium text-md mb-2">
                            <x-application-logo />
                        </h5>
                        <p class="futura-book text-sm">
                            A well-olied engine that works enormously to provide the best investment service to seasoned and amateur 
                            investors. Don't worry, we've got your back always.
                        </p>
                        <div class="mt-4">
                            <p class="futura-medium text-md">Contact us</p>
                            <div class="mt-2 text-sm"><a href="{{route('contact')}}" class="underline">Chat</a> or <a href="mailto:{{config('mail.mainTo.address')}}" class="underline">Email</a></div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- copyright --}}
            <div class="pt-10 pb-6">
                <div class="w-full flex items-center justify-center">
                    <div class="max-w-2xl mx-auto flex flex-col items-center">
                        <p class="futura-light text-sm mb-px">
                            © 2016–{{now()->year}}, {{config('app.name')}} Technologies Inc. All Rights Reserved.
                        </p>
                        <p class="futura-light text-sm mb-px">
                            By using this website, you accept our <a href="{{route('terms.show')}}" class="underline">Terms of Use</a> and <a href="{{route('policy.show')}}" class="underline">Privacy Policy.</a>
                        </p>
                        <p class="futura-light text-sm mb-px">
                            For information about filing a complaint please visit <a href="{{route('contact')}}" class="underline">our contact page</a> and use subject 'How to File a Complaint'.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>