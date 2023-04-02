<div class="row mb-4">
    <div class="col-sm-12 col-lg-6">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $category->title ?? old('title') }}" required>
        </div>
    </div>
    <div class="col-sm-12 col-lg-6" id="parentCategoryDiv" @if(isset($category) && ($category->parent_id == 0)) style="display: none;" @endif>
        <div class="form-group">
            <label for="title">Parent Category:</label>
            {!! App\Models\Category::attr(['name' => 'parent_id', 'class' => 'form-control'])
                ->selected($category->parent_id ?? null)
                ->renderAsDropdown(); !!}
        </div>
    </div>
    <div class="col-sm-12 mt-1">
        <div class="checkbox">
            <label><input type="checkbox" name="is_parent_category" id="is_parent_category" @if(isset($category) && ($category->parent_id == 0)) checked @endif> Is Parent Category</label>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-success">Submit</button>
@push('footer_scripts')
    <script type="text/javascript">
        $(document).ready(function (){
            $(document).on('change', '#is_parent_category', function (){
                $("#parentCategoryDiv").toggle($(this).prop('checked')!=true)
            })
        })
    </script>
@endpush
