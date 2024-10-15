<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <a href="{{ route('cadastrar') }}" class="btn btn-primary btn-sm">
                        <strong> Cadastrar novo usuário </strong>
                    </a>

                    <p> &nbsp;</p>

                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Nome</th>
                            <th class="border border-gray-300 px-4 py-2">Email</th>
                            <th class="border border-gray-300 px-4 py-2">Data de Criação</th>
                            <th class="border border-gray-300 px-4 py-2">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $dados)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $dados->name }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $dados->email }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $dados->created_at?->format('d/m/Y H:i:s') ?? '' }}</td>
                                <td class="border border-gray-300 px-4 py-2">

                                    <a href="{{ route('edit', $dados->id) }}" class="btn btn-primary btn-sm">
                                        Editar
                                    </a>

                                    @if(\Illuminate\Support\Facades\Auth::user()->id != $dados->id)
                                    <form action="{{ route('delete', $dados->id) }}" method="get"
                                          style="display:inline;">
                                        @csrf
                                        @method('get')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Tem certeza que deseja excluir?');">
                                            Excluir
                                        </button>
                                    </form>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
