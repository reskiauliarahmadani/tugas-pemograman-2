<x-layout title="Edit Resep">
    <div style="max-width:700px; margin:0 auto;">
        <a href="{{ route('recipes.index') }}" style="color:var(--orange); text-decoration:none; font-size:0.9rem;">
            ← Kembali
        </a>

        <div class="card" style="margin-top:1.5rem;">
            <h1 style="font-size:1.7rem; margin-bottom:1.8rem; color:var(--brown);">✏️ Edit Resep</h1>

            <form action="{{ route('recipes.update', $recipe) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nama Resep <span style="color:red">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name', $recipe->name) }}"
                        placeholder="Contoh: Nasi Goreng Spesial">
                    @error('name')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">
                    <div class="form-group">
                        <label for="category">Kategori <span style="color:red">*</span></label>
                        <select id="category" name="category">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach (['Makanan Berat', 'Camilan', 'Minuman', 'Dessert'] as $cat)
                                <option value="{{ $cat }}"
                                    {{ old('category', $recipe->category) == $cat ? 'selected' : '' }}>
                                    {{ $cat }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="difficulty">Tingkat Kesulitan <span style="color:red">*</span></label>
                        <select id="difficulty" name="difficulty">
                            <option value="">-- Pilih Kesulitan --</option>
                            @foreach (['Mudah', 'Sedang', 'Sulit'] as $diff)
                                <option value="{{ $diff }}"
                                    {{ old('difficulty', $recipe->difficulty) == $diff ? 'selected' : '' }}>
                                    {{ $diff }}
                                </option>
                            @endforeach
                        </select>
                        @error('difficulty')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">
                    <div class="form-group">
                        <label for="duration">Durasi Memasak (menit) <span style="color:red">*</span></label>
                        <input type="number" id="duration" name="duration"
                            value="{{ old('duration', $recipe->duration) }}" min="1">
                        @error('duration')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="servings">Jumlah Porsi <span style="color:red">*</span></label>
                        <input type="number" id="servings" name="servings"
                            value="{{ old('servings', $recipe->servings) }}" min="1">
                        @error('servings')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="ingredients">Bahan-Bahan <span style="color:red">*</span></label>
                    <textarea id="ingredients" name="ingredients" rows="5">{{ old('ingredients', $recipe->ingredients) }}</textarea>
                    @error('ingredients')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="instructions">Cara Memasak <span style="color:red">*</span></label>
                    <textarea id="instructions" name="instructions" rows="6">{{ old('instructions', $recipe->instructions) }}</textarea>
                    @error('instructions')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div style="display:flex; gap:0.8rem; margin-top:0.5rem;">
                    <button type="submit" class="btn btn-primary">💾 Update Resep</button>
                    <a href="{{ route('recipes.index') }}" class="btn btn-outline">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
