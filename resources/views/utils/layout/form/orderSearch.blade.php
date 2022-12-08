<div class="form-group col-sm-4">
    <label class="form-label">Método:</label>
    <select class="form-control form-select" name="sort" required>
        <option value="desc" {{ isset($_GET['sort']) ? ($_GET['sort'] === 'desc' ? 'selected' : '') : '' }}>
            Descendente
        </option>
        <option value="asc" {{ isset($_GET['sort']) ? ($_GET['sort'] === 'asc' ? 'selected' : '') : '' }}>
            Ascendente
        </option>
    </select>
</div>
<div class="form-group col-sm-3">
    <label class="form-label">Qtd:</label>
    <input type="number" name="quantidade" value="{{ $_GET['quantidade'] ?? 25 }}" class="form-control" step="25">
</div>
