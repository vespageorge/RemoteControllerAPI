<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="action-btn hidden">
                <button class="close-list-script"><i class="fa-solid fa-circle-xmark"></i></button>
                <h2>Manage device</h2>
                <div class="setup-info">
                    <i class="fa-solid fa-desktop"></i>
                    <div>
                        <h3 class="device_name">DESKTOP-PJQ14E7</h3>
                    </div>
                </div>
                <hr>
                <div class="list-scripts">
                    @foreach($cmds as $cmd)
                        <a href="#" class="script" script="{{$cmd->cmd}}" script-id="{{$cmd->id}}">
                            <i class="fa-solid fa-code"></i>
                            <div class="script-info">
                                <h3>{{$cmd->cmd}}</h3>
                                <p>{{$cmd->description}}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="bg-white">
                <table class="list-setups">
                    <thead>
                    <tr>
                        <td>Name device</td>
                        <td>Platform</td>
                        <td>IP address</td>
                        <td>MAC Address</td>
                        <td>Created at</td>
                    </tr>
                    </thead>
                    @foreach($setups as $setup)
                        <tr id_user="{{$setup->id}}" class="setup_id" name="{{$setup->hostname}}">
                            <td>{{$setup->hostname}}</td>
                            <td>{{$setup->platform}}</td>
                            <td>{{$setup->ip_address}}</td>
                            <td>{{$setup->mac_address}}</td>
                            <td>{{$setup->created_at}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
