@extends('layouts.app')

@section('content')
    <h1>Home</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at rhoncus sem, sed tristique urna. Phasellus eget massa ac neque pretium venenatis eget hendrerit quam. Pellentesque lectus tellus, faucibus ut volutpat vel, facilisis ut dolor. Phasellus pretium, metus quis hendrerit condimentum, dui enim mattis mauris, a luctus ex diam non odio. Vivamus dignissim in erat porta porttitor. Pellentesque tincidunt commodo enim at rhoncus. Nam efficitur diam ut vehicula aliquet. Sed lectus nibh, varius eu lorem non, placerat rutrum augue. Vestibulum tempor elementum augue a lobortis.

        Phasellus iaculis nisi eget risus blandit sagittis. Sed euismod, dolor eu lobortis maximus, orci massa laoreet nunc, id luctus eros justo vel turpis. Nullam euismod enim quis nisi aliquet, ac sodales justo auctor. Sed est velit, vestibulum eget volutpat sed, finibus eu risus. Nulla facilisi. Donec dolor diam, sollicitudin eu faucibus ac, gravida eu sapien. In hac habitasse platea dictumst. Donec justo lectus, interdum eu sapien eget, sodales tincidunt felis. Donec nec scelerisque leo. Nunc facilisis, ante in molestie scelerisque, dui augue interdum leo, ut eleifend ipsum metus eu turpis. Nulla eget finibus nisi, eget aliquam lorem.

        Morbi id nulla at ex semper egestas. Praesent gravida volutpat purus id efficitur. Nam venenatis erat tempor iaculis dictum. Quisque viverra, magna vel commodo maximus, massa enim accumsan odio, in aliquet tortor risus placerat sapien. Nullam in egestas velit, ac imperdiet ipsum. Aliquam dictum quam id felis elementum lobortis. Morbi ante justo, pulvinar sed felis eu, hendrerit blandit leo. Nunc tristique semper tincidunt.

        Proin venenatis tempus porttitor. Cras sodales bibendum ligula, in dictum mauris tempor non. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer mollis, neque non vehicula auctor, elit ex pharetra orci, nec tincidunt justo nibh quis felis. Etiam auctor augue et tellus accumsan mattis. Aliquam blandit lorem eget nunc facilisis varius. Fusce mattis volutpat dolor eu gravida. Duis vitae odio justo. Phasellus sit amet arcu porttitor, laoreet neque vehicula, maximus nisl. Duis lobortis sit amet elit a cursus. Fusce quis dignissim purus, eu mattis arcu. Nullam quis euismod quam, vitae rhoncus ex. Aenean tempus elit ligula, in ultricies lacus lobortis vitae. Praesent vel felis tellus. Phasellus faucibus convallis massa quis ullamcorper. Aenean eu odio in magna pellentesque pharetra at eu velit.

        Aenean ut iaculis quam, in rhoncus leo. Fusce vulputate nibh a nunc porttitor convallis. Suspendisse ex justo, dignissim non pharetra quis, lacinia non lectus. Pellentesque eget lacus justo. Fusce nunc lacus, ullamcorper at metus et, elementum tempor enim. Praesent gravida, augue eu consectetur accumsan, tellus mi volutpat nibh, vitae elementum arcu lacus quis augue. Duis interdum vulputate turpis, eu semper enim tempus et. Cras rutrum eleifend egestas. Maecenas in malesuada enim, sit amet viverra quam. Sed molestie leo eu dolor ornare eleifend. Ut dolor orci, viverra id ultrices rutrum, egestas nec lectus. Vivamus non congue purus. Proin ut condimentum ante, fermentum placerat ante.</p>
@endsection

@section('sidebar')
    @parent
    <p>this is appended.</p>
@endsection