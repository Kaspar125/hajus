<x-app-layout>
form action="/my_favorite_subject" method="post">
    @csrf
    <input type="text" name="title" placeholder="Title">
    <input type="text" name="image" placeholder="Image">
    <input type="text" name="description" placeholder="Description">
    <input type="text" name="website" placeholder="Website">
    <input type="checkbox" name="is_awesome" id="is_awesome">
    <label for="is_awesome">Is awesome</label>
    <button type="submit">Submit</button>
</form>
</x-app-layout>