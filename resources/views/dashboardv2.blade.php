<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dashboard-setups">
                <div class="panel-setups">
                    @foreach($setups as $setup)
                    <div class="setup" name="{{$setup->hostname}}" id_user="{{$setup->id}}">
                        <h3 class="hostname">{{$setup->hostname}}</h3>
                        <p class="ip_address">{{$setup->ip_address}}</p>
                    </div>
                    @endforeach
                </div>
                <!--  -->
                <div class="action-btn hidden">
                    <button class="close-list-script"><i class="fa-solid fa-circle-xmark"></i></button>
                    <h2>Manage device</h2>
                    <div class="setup-info">
                        <i class="fa-solid fa-desktop"></i>
                        <div>
                            <h3 class="device_name"></h3>
                        </div>
                    </div>
                    <div class="list-scripts">
                        @foreach($cmds as $cmd)
                        <a href="#" class="script flex-fill" script="{{$cmd->cmd}}" script-id="{{$cmd->id}}">
                            <div class="script-info">
                                <h3>{{$cmd->cmd}}</h3>
                                <p>{{$cmd->description}}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>