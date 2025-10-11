<x-user-layout>
    <x-user-nav page="Deposit" />
    <div class="frank-regular w-full px-6 py-6 mx-auto">
        <!-- content -->
        <div class="flex flex-wrap -mx-3">
            <div class="max-w-full px-3 mb-6 lg:mb-0 lg:w-full lg:flex-none">
                <div class="w-full lg:w-7/12 mx-auto flex flex-col items-center min-w-0 mt-6 px-4 pb-10 break-words bg-primary-50 border border-transparent hover:border-blue-500 rounded-2xl bg-clip-border">
                    <img src="{{asset('/images/success.gif')}}" alt="success gif" class="w-60 h-48">
                    <h2 class="capitolium text-2xl mt-5 mb-4 text-primary-500">Great job! One more step.</h2>
                    <p class="text-sm mb-4 text-primary-500">
                        Send ${{number_format($deposit['amount'])}} worth of {{$deposit['wallet']}} to the provided wallet address 
                        below. Upload a screenshot of the transaction 
                        to your deposit record. Check your email for a copy of this deposit instruction.
                    </p>
                    <div class="w-full flex flex-col mb-4 md:mb-6">
                        <p class="w-full text-md frank-bold mb-2 text-primary-500"><span class="capitalize">{{$deposit['wallet']}}</span> Deposit address</p>
                        <div class="w-full p-2 border rounded-xl border-primary text-primary bg-primary-white shadow-md w-full flex items-center flex-nowrap"  
                            x-data="{ inputValue: '',isClicked : false, copyToClipboard: function() {                        
                                var input = $refs.input;
                                
                                input.select();
                                input.setSelectionRange(0, 99999);
                        
                                document.execCommand('copy');
                                this.isClicked = true;

                                setTimeout(()=>{
                                    this.isClicked = false;
                                },3000)
                            } }">
                            <input readonly class="appearance-none w-10/12 outline-none focus:outline-none border-none bg-primary-white p-2 text-primary focus:outline-none focus:border-primary-white" type="text" x-ref="input" value="{{$deposit['address']}}">
                            <button x-on:click="copyToClipboard()" x-on:click="isClicked = ! isClicked" class="w-2/12">   
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#005bd8" :class="{'hidden' : isClicked, 'inline-flex' : ! isClicked }" class="w-9 h-9 inline-flex">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                </svg>               
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#005bd8" :class="{'hidden' : !isClicked, 'inline-flex' : isClicked }"  class="w-9 h-9 hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                                </svg> 
                            </button>
                        </div>
                    </div>                    
                
                    <div class="flex justify-center items-center flex-wrap">
                        <x-link-two href="{{route('user.deposits')}}" class="tracking-wide py-3 mb-4 md:mb-0 md:mr-3">View deposits</x-link-two>                        
                        <x-link-one href="{{route('user.dashboard')}}" class="font-semibold tracking-wide py-3">Dashboard</x-link-one>                                                                     
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-user-footer />
</x-user-layout>
