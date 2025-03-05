<div>
    <label for="assigned_user" class="block text-sm font-medium text-gray-900">Assigned to</label>
    <div class="relative mt-2">
        <select name="assigned_to" id="assigned_user" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <option value="">Select a user</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $selected == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
