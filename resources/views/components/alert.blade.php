    <!-- Alert component with dynamic content -->
    <div class="alert">
        {{ $slot }}
    </div>

    {{-- der $slot wird dann beim Aufruf der Komponente gefüttert --}}
    {{-- Der Aufruf z.b: im Hauptlayout wo auch <!DOCTYPE .. ist! 
         oder in den HTML-Fragementen die mit yield oder include eingelagert werden --}}
    {{-- <x-alert>
        <p style="color:blue">This is an important message!</p>
    </x-alert> --}}
