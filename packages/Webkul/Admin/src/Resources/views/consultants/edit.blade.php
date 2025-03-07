
<x-admin::layouts>
    <!-- Page Title -->
    <x-slot:title>
        @lang('admin::app.consultants.edit.title')
    </x-slot>

    {!! view_render_event('admin.consultants.edit.form.before') !!}

    <x-admin::form
        :action="route('admin.consultants.update', $consultant->id)"
        encType="multipart/form-data"
        method="PUT"
    >
        <div class="flex flex-col gap-4">
            <div class="flex items-center justify-between rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
                <div class="flex flex-col gap-2">
                    <div class="flex cursor-pointer items-center">
                        <!-- Breadcrumbs -->
                        <x-admin::breadcrumbs
                            name="consultants.edit"
                            :entity="$consultant"
                        />
                    </div>

                    <div class="text-xl font-bold dark:text-white">
                        @lang('admin::app.consultants.edit.title')
                    </div>
                </div>

                <div class="flex items-center gap-x-2.5">
                    <div class="flex items-center gap-x-2.5">
                        {!! view_render_event('admin.consultants.edit.create_button.before', ['product' => $consultant]) !!}

                        <!-- Edit button for Product -->
                        <button
                            type="submit"
                            class="primary-button"
                        >
                            @lang('admin::app.consultants.create.save-btn')
                        </button>

                        {!! view_render_event('admin.consultants.edit.create_button.after', ['product' => $consultant]) !!}
                    </div>
                </div>
            </div>

            <div class="flex gap-2.5 max-xl:flex-wrap">
                <!-- Left sub-component -->
                <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">
                    <div class="box-shadow rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-gray-900">
                        <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                            @lang('admin::app.consultants.edit.general')
                        </p>

                        {!! view_render_event('admin.consultants.create.attributes.before') !!}
                        <x-admin::form.control-group>
                            <x-admin::form.control-group.label class="required">
                                @lang('admin::app.consultants.create.first_name')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="first_name"
                                id="first_name"
                                rules="required"
                                :label="trans('admin::app.consultants.create.first_name')"
                                value="{{ old('first_name') ?? $consultant->first_name }}"
                            />

                            <x-admin::form.control-group.error control-name="first_name" />
                        </x-admin::form.control-group>

                        <x-admin::form.control-group>
                            <x-admin::form.control-group.label class="required">
                                @lang('admin::app.consultants.create.last_name')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="last_name"
                                id="last_name"
                                rules="required"
                                :label="trans('admin::app.consultants.create.last_name')"
                                value="{{ old('last_name') ?? $consultant->last_name }}"
                            />

                            <x-admin::form.control-group.error control-name="last_name" />
                        </x-admin::form.control-group>

                        <x-admin::form.control-group>
                            <x-admin::form.control-group.label class="required">
                                @lang('admin::app.consultants.edit.consultant_title')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="title"
                                id="title"
                                :label="trans('admin::app.consultants.create.consultant_title')"
                                value="{{ old('title') ?? $consultant->title }}"
                            />

                            <x-admin::form.control-group.error control-name="title" />
                        </x-admin::form.control-group>

                        <x-admin::form.control-group>
                            <x-admin::form.control-group.label class="required">
                                @lang('admin::app.consultants.create.phone')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="phone"
                                id="phone"
                                rules="required"
                                :label="trans('admin::app.consultants.create.phone')"
                                value="{{ old('phone') ?? $consultant->phone }}"
                            />

                            <x-admin::form.control-group.error control-name="phone" />
                        </x-admin::form.control-group>

                        <x-admin::form.control-group>
                            <x-admin::form.control-group.label class="required">
                                @lang('admin::app.consultants.create.email')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="email"
                                name="email"
                                id="email"
                                :label="trans('admin::app.consultants.create.email')"
                                value="{{ old('email') ?? $consultant->email }}"
                            />

                            <x-admin::form.control-group.error control-name="email" />
                        </x-admin::form.control-group>

                        {!! view_render_event('admin.consultants.create.attributes.after') !!}
                    </div>
                </div>

                <!-- Right sub-component -->
                <div class="flex w-[360px] max-w-full flex-col gap-2 max-sm:w-full">
                    {!! view_render_event('admin.consultants.create.accordion.before') !!}

                    <x-admin::accordion>
                        <x-slot:header>
                            {!! view_render_event('admin.consultants.create.accordion.header.before') !!}

                            <div class="flex items-center justify-between">
                                <p class="p-2.5 text-base font-semibold text-gray-800 dark:text-white">
                                    @lang('admin::app.consultants.create.price')
                                </p>
                            </div>

                            {!! view_render_event('admin.consultants.create.accordion.header.after') !!}
                        </x-slot>

                        <x-slot:content>
                            {!! view_render_event('admin.consultants.create.accordion.content.attributes.before') !!}

                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('admin::app.consultants.create.cjm')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="price"
                                    name="cjm"
                                    id="cjm"
                                    rules="required"
                                    :label="trans('admin::app.consultants.create.cjm')"
                                    value="{{ old('cjm') ?? $consultant->cjm }}"
                                />

                                <x-admin::form.control-group.error control-name="cjm" />
                            </x-admin::form.control-group>

                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('admin::app.consultants.create.tjm')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="price"
                                    name="tjm"
                                    id="tjm"
                                    rules="required"
                                    :label="trans('admin::app.consultants.create.tjm')"
                                    value="{{ old('tjm') ?? $consultant->tjm }}"
                                />

                                <x-admin::form.control-group.error control-name="tjm" />
                            </x-admin::form.control-group>

                            {!! view_render_event('admin.consultants.create.accordion.content.attributes.after') !!}
                        </x-slot>
                    </x-admin::accordion>

                    {!! view_render_event('admin.consultants.create.accordion.before') !!}
                </div>
            </div>
        </div>
    </x-admin::form>

    {!! view_render_event('admin.consultants.edit.form.after') !!}
</x-admin::layouts>
