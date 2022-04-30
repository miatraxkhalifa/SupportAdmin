<div wire:poll.keep-alive>
    <div class=" dark:bg-gray-700 shadow overflow-hidden sm:rounded-lg ml-2 mr-2 mt-2 mb-2">
        <div class="flex w-full justify-between flex-wrap rounded-lg shadow-sm dark:shadow-sm mb-2">
            <div class="px-2 py-3 sm:px-4 ">
                <h3 class="text-lg leading-6 font-small text-gray-900 dark:text-white">{{$task->TaskType->name}}</h3>
                <p class="mt-1 max-w-2xl text-xs text-gray-500 dark:text-white">Engagis Support Admin Task Details.</p>
                <p class="mt-1 max-w-2xl text-xs text-gray-400 dark:text-white"> Updated at: <span class="text-xs text-gray-600 dark:text-gray-400"> {{ \Carbon\Carbon::parse($task->updated_at)->diffForHumans() }} </span></p>


            </div>
            <div class="px-2 py-3 sm:px-4">
                <p class="mt-1 max-w-2xl text-xs text-gray-500 dark:text-white">Status:
                    @if($task->status === 1)
                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                        Pending
                    </span>
                    @elseif($task->status === 2)
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        Grabbed
                    </span>
                    @elseif($task->status === 3)
                    <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-100">
                        Completed
                    </span>
                    @endif
                </p>
                <p class="mt-1 max-w-2xl text-xs text-gray-500 dark:text-white"> Created at: <span class="text-xs text-gray-600 dark:text-gray-400"> {{ \Carbon\Carbon::parse($task->created_at)->diffForHumans() }} </span></p>
            </div>
            <div class="px-2 py-3 sm:px-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    <a href="{{route('dashboard.update', [$task->id]) }}"> <button class="px-2 py-1 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Edit
                        </button> </a>
                </h3>
            </div>
        </div>
        <!-- Task Table -->
        <div class="grid gap-2 md:grid-cols-2 xl:grid-cols-2 mb-2 ">
            <div class="border-black space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-50">Case Number:</dt>
                        <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">{{$task->case}}</dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-50">Client:</dt>
                        <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">{{$task->client}}</dd>
                    </div>
                </dl>
            </div>
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs  dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-50">Case Owner:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-100"> {{$task->Owner->name}} </dd>
                    </div>

                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-50">Admin Owner:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-100">
                            @isset($task->Admin->name){{$task->Admin->name}} @endisset</dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Onsite Tech Table -->
        @isset($task->OnsiteTech)
        <div class="grid gap-2 mb-2 md:grid-cols-2 xl:grid-cols-2 mb-2">
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Device Name:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200">{{$task->OnsiteTech->deviceName}}</dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Issue Reported:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200">{{$task->OnsiteTech->issue}}</dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Site Status:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->OnsiteTech->siteStatus}} </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Job Description:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200">
                            {{$task->OnsiteTech->jobDescription}}
                        </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Date Completed:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->OnsiteTech->dateCompleted}} </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Job Report:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200">
                            {{$task->OnsiteTech->jobReport}}
                        </dd>
                    </div>
                </dl>
            </div>
            <div class="border-gray-200 dark:border-white space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Contact Name:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->OnsiteTech->contactName}} </dd>
                    </div>

                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Contact Email:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->OnsiteTech->contactEmail}} </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Contact Number:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->OnsiteTech->contactNumber}} </dd>
                    </div>

                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Site Address:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->OnsiteTech->address}} </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">PO:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->OnsiteTech->PO}} </dd>
                    </div>

                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Admin Remarks:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->OnsiteTech->remarks}} </dd>
                    </div>
                </dl>
            </div>
        </div>
        @endisset
        <!-- Invoice Request Table -->
        @isset($task->InvoiceRequest)
        <div class="grid gap-2 mb-2 md:grid-cols-2 xl:grid-cols-2">
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Quote Status:</dt>

                        <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900"> {{$task->InvoiceRequest->Status}} </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Quote:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->InvoiceRequest->OutofScope->quote}}</dd>
                    </div>
                </dl>
            </div>
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Task Owner Remarks:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->InvoiceRequest->remarks}} </dd>
                    </div>
                </dl>
            </div>
        </div>
        @endisset
        <!--OnsiteTechScoping Table -->
        @isset($task->OnsiteTechScoping)
        <div class="grid gap-2 mb-2 md:grid-cols-2 xl:grid-cols-2">
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Device Name:</dt>

                        <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900"> {{$task->OnsiteTechScoping->deviceName}} </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Issue Reported:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->OnsiteTechScoping->deviceName}}</dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Address:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->OnsiteTechScoping->address}}</dd>
                    </div>
                </dl>
            </div>
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Job Description :</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->OnsiteTechScoping->description}} </dd>
                    </div>
                </dl>
            </div>
        </div>
        @endisset
        <!--ItemInquiry Table -->
        @isset($task->ItemInquiry)
        <div class="grid gap-2 mb-2 md:grid-cols-2 xl:grid-cols-2">
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Item/Hardware Name:</dt>

                        <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900"> {{$task->ItemInquiry->item}} </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Quantity:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->ItemInquiry->quantity}}</dd>
                    </div>
                </dl>
            </div>
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Remarks :</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->ItemInquiry->remarks}} </dd>
                    </div>
                </dl>
            </div>
        </div>
        @endisset
        <!--WarrantyRepair Table -->
        @isset($task->WarrantyRepair)
        <div class="grid gap-2 mb-2 md:grid-cols-2 xl:grid-cols-2">
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Issue Reported:</dt>
                        <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900"> {{$task->WarrantyRepair->issue}} </dd>
                    </div>

                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Hardware Type:</dt>

                        <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900"> {{$task->WarrantyRepair->type}} </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Contact Name:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->WarrantyRepair->contactName}}</dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Contact Number:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->WarrantyRepair->contactNumber}}</dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Contact Email:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->WarrantyRepair->contactEmail}}</dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Site Address:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->WarrantyRepair->address}}</dd>
                    </div>
                </dl>
            </div>
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Approver :</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->WarrantyRepair->Approver->name}} </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Brand and Model :</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->WarrantyRepair->brandModel}} </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Serial Number :</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->WarrantyRepair->serial}} </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Vendor Quote :</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->WarrantyRepair->quote}} </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> T/S Steps Performed :</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->WarrantyRepair->remarks}} </dd>
                    </div>
                </dl>
            </div>
        </div>
        @endisset
        <!--HardwareReturn Table -->
        @isset($task->HardwareReturn)
        <div class="grid gap-2 mb-2 md:grid-cols-2 xl:grid-cols-2">
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Status:</dt>

                        <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                            @if($task->HardwareReturn->status == 0) For Collection
                            @elseif($task->HardwareReturn->status == 1) For Pick up
                            @elseif($task->HardwareReturn->status == 2) Shipped
                            @elseif($task->HardwareReturn->status == 3) Returned
                            @elseif($task->HardwareReturn->status == 4) For RA
                            @endif
                        </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Device Name:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->HardwareReturn->SO->deviceName}}</dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Hardware Type:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->HardwareReturn->HardwareType->pluck('name')->first()}}</dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Approver</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->HardwareReturn->Approver->pluck('name')->first()}}</dd>
                    </div>
                </dl>
            </div>
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Contact Name :</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->HardwareReturn->SO->contactName}} </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Contact Number :</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->HardwareReturn->SO->contactNumber}} </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Contact Email :</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->HardwareReturn->SO->contactEmail}} </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Remarks :</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->HardwareReturn->remarks }} </dd>
                    </div>
                </dl>
            </div>
        </div>
        @endisset
        <!--SO Table -->
        @isset($task->SO)
        <div class="grid gap-2 mb-2 md:grid-cols-2 xl:grid-cols-2">
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Hardware Disposal:</dt>
                        <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                            @if($task->SO->disposal == 0) N/A
                            @elseif($task->SO->disposal == 1) Engagis Tech to Dispose
                            @elseif($task->SO->disposal == 2) Store to Dispose
                            @elseif($task->SO->disposal == 3) Return to Engagis
                            @endif
                        </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> SO Status:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200">
                            @if($task->SO->Status == 'WIP')
                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                {{$task->SO->Status}} </span>

                            @elseif($task->SO->Status == 'Awaiting Dispatch')
                            <span class="px-2 py-1 font-semibold leading-tight text-pink-700 bg-pink-100 rounded-full dark:bg-pink-700 dark:text-pink-100">
                                {{$task->SO->Status}} </span>

                            @elseif($task->SO->Status == 'Awaiting Hardware')
                            <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-700 dark:text-orange-100">
                                {{$task->SO->Status}} </span>

                            @elseif($task->SO->Status == 'Cancelled')
                            <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:bg-red-700 dark:text-gray-100">
                                {{$task->SO->Status}} </span>

                            @elseif($task->SO->Status == 'onHold')
                            <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                {{$task->SO->Status}} </span>

                            @elseif($task->SO->Status == 'Shipped')
                            <span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">
                                {{$task->SO->Status}} </span>

                            @endif
                        </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Device Name:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->SO->deviceName}} </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Hardware Type:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->SO->SO_TYPE->name }}</dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Approver:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->SO->Approver->name }}</dd>
                    </div>
                </dl>
            </div>
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <dl>
                        <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                            <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Contact Name :</dt>
                            <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->SO->contactName}} </dd>
                        </div>
                        <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                            <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Contact Number :</dt>
                            <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->SO->contactNumber}} </dd>
                        </div>
                        <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                            <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Contact Email :</dt>
                            <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->SO->contactEmail}} </dd>
                        </div>
                        <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                            <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Reason for Replacement :</dt>
                            <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->SO->remarks}} </dd>
                        </div>
                    </dl>
                </dl>
            </div>
        </div>
        @isset($task->SO->SO_Type_MP)
        <div class="grid gap-2 mb-2 md:grid-cols-2 xl:grid-cols-2">
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl class="pt-1">
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">LabTech Status:</dt>
                        <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                            @if($task->SO->SO_Type_MP->status == 0) <span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100"> Online </span>
                            @elseif($task->SO->SO_Type_MP->status == 1) <span class="px-2 py-1 font-semibold leading-tight text-pink-700 bg-pink-100 rounded-full dark:bg-red-700 dark:text-pink-100">Offline </span>
                            @endif
                        </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Connection Type:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->SO->SO_Type_MP->connection_type}} </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Application:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->SO->SO_Type_MP->application }}</dd>
                    </div>

                </dl>
            </div>
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl class="pt-1">
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Solution:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->SO->SO_Type_MP->solution }}</dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Orientation :</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->SO->SO_Type_MP->orientation}} </dd>
                    </div>
                </dl>
            </div>
        </div>
        @endisset
        @isset($task->SO->SO_Type_Network)
        <div class="grid gap-2 mb-2 md:grid-cols-2 xl:grid-cols-2">
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">LabTech Status:</dt>
                        <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                            @if($task->SO->SO_Type_Network->status == 0) Online
                            @elseif($task->SO->SO_Type_Network->status == 1) Engagis Tech to Dispose
                            @endif
                        </dd>
                    </div>

                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Network Device:</dt>
                        <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                            {{ucwords($task->SO->SO_Type_Network->type)}}
                        </dd>
                    </div>
                </dl>
            </div>
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Connection Type:</dt>
                        <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                            {{ucwords($task->SO->SO_Type_Network->connection_type)}}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
        @endisset
        @isset($task->SO->SO_Type_Others)
        <div class="grid gap-2 mb-2 md:grid-cols-2 xl:grid-cols-2">
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Hardware Details:</dt>
                        <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                            {{$task->SO->SO_Type_Others->details}}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
        @endisset
        @isset($task->SO->SO_Type_Projector)
        <div class="grid gap-2 mb-2 md:grid-cols-2 xl:grid-cols-2">
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Brand:</dt>
                        <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                            {{$task->SO->SO_Type_Projector->brand}}
                        </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Model:</dt>
                        <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                            {{$task->SO->SO_Type_Projector->model}}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
        @endisset

        @isset($task->SO->SO_Type_ProjectorLamp)
        <div class="grid gap-2 mb-2 md:grid-cols-2 xl:grid-cols-2">
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Brand:</dt>
                        <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                            {{$task->SO->SO_Type_ProjectorLamp->brand}}
                        </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Model:</dt>
                        <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                            {{$task->SO->SO_Type_ProjectorLamp->model}}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
        @endisset

        @isset($task->SO->SO_Type_Screen)
        <div class="grid gap-2 mb-2 md:grid-cols-2 xl:grid-cols-2">
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Brand:</dt>
                        <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                            {{$task->SO->SO_Type_Screen->brand}}
                        </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Model:</dt>
                        <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                            {{$task->SO->SO_Type_Screen->model}}
                        </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Serial Number:</dt>
                        <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                            {{$task->SO->SO_Type_Screen->serial}}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
        @endisset


        @endisset

    </div>

</div>