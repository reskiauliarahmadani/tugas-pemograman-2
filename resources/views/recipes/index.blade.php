<x-layout title="Daftar Resep">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:2rem;">
        <div>
            <h1 style="font-size:2rem; color:var(--brown);">Daftar Resep Masakan</h1>
            <p style="color:#9e8c7b; margin-top:0.3rem;">Total {{ $recipes->total() }} resep tersedia</p>
        </div>
        <a href="{{ route('recipes.create') }}" class="btn btn-primary">+ Tambah Resep</a>
    </div>

    @if ($recipes->isEmpty())
        <div class="card" style="text-align:center; padding:3rem;">
            <p style="font-size:3rem;">🍽️</p>
            <p style="color:#9e8c7b; margin-top:1rem;">Belum ada resep. Tambahkan resep pertama!</p>
        </div>
    @else
        <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap:1.5rem;">
            @foreach ($recipes as $recipe)
                <div class="card" style="padding:1.5rem; transition: transform 0.2s, box-shadow 0.2s;"
                    onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 32px rgba(61,43,31,0.15)'"
                    onmouseout="this.style.transform=''; this.style.boxShadow=''">

                    <div
                        style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:0.8rem;">
                        <span
                            style="background:var(--orange); color:white; font-size:0.75rem; padding:0.25rem 0.7rem; border-radius:20px; font-weight:500;">
                            {{ $recipe->category }}
                        </span>
                        <span
                            style="font-size:0.78rem; color:#9e8c7b; background:#f5f0ea; padding:0.25rem 0.6rem; border-radius:20px;">
                            {{ $recipe->difficulty }}
                        </span>
                    </div>

                    <h3 style="font-size:1.15rem; margin-bottom:0.5rem; color:var(--brown);">{{ $recipe->name }}</h3>

                    <div style="display:flex; gap:1rem; font-size:0.82rem; color:#9e8c7b; margin-bottom:1.2rem;">
                        <span>⏱ {{ $recipe->duration }} menit</span>
                        <span>🍽 {{ $recipe->servings }} porsi</span>
                    </div>

                    <p style="font-size:0.875rem; color:#7a6a5a; line-height:1.5; margin-bottom:1.3rem;">
                        {{ Str::limit($recipe->ingredients, 80) }}
                    </p>

                    <div style="display:flex; gap:0.6rem; flex-wrap:wrap;">
                        <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-outline"
                            style="font-size:0.82rem; padding:0.4rem 0.9rem;">
                            Detail
                        </a>
                        <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-secondary"
                            style="font-size:0.82rem; padding:0.4rem 0.9rem;">
                            Edit
                        </a>
                        <form action="{{ route('recipes.destroy', $recipe) }}" method="POST"
                            onsubmit="return confirm('Hapus resep ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                style="font-size:0.82rem; padding:0.4rem 0.9rem;">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="margin-top:2rem;">
            {{ $recipes->links() }}
        </div>
    @endif
</x-layout>
