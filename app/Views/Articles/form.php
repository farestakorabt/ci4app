<label for="title">Title</label>
<input type="text" name="title" id="title" value="<?= old("title", esc($article->title)) ?>">

<label for="content">Content</label>
<textarea name="content" id="content" cols="30" rows="10"><?= old("content", esc($article->content)) ?></textarea>

<button>Save</button>