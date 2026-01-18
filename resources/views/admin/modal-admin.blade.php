<!-- Ajouter un produit-->
<div class="modal fade" id="productModal-add-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un produit ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.addProduct', ['slug' => $user->slug]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div style="margin-bottom: 12px;">
                        <label for="addProductName" style="display: block; margin-bottom: 4px; font-weight: 600;">Nom du
                            produit</label>
                        <input type="text" id="addProductName" name="title" required class="form-control w-100 mb-2"
                            placeholder="Nom du produit">
                    </div>

                    <div style="margin-bottom: 12px;">
                        <label for="addProductCategory"
                            style="display: block; margin-bottom: 4px; font-weight: 600;">Catégorie</label>
                        <select id="addProductCategory" name="category" required class="form-control w-100 mb-2">
                            <option value="">Sélectionner une catégorie</option>
                            <option value="Santé">Santé</option>
                            <option value="Alimentation">Alimentation</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 12px;">
                        <label for="addProductPrice" style="display: block; margin-bottom: 4px; font-weight: 600;">Prix
                            (FCFA)</label>
                        <input type="number" id="addProductPrice" name="price" required min="0" step="0.01"
                            class="form-control w-100 mb-2" placeholder="Ex : 1000">
                    </div>

                    <div style="margin-bottom: 12px;">
                        <label for="addProductStock"
                            style="display: block; margin-bottom: 4px; font-weight: 600;">Stock</label>
                        <input type="number" id="addProductStock" name="stock" required min="0"
                            class="form-control w-100 mb-2" placeholder="Quantité en stock">
                    </div>

                    <div style="margin-bottom: 12px;">
                        <label for="addProductImage" style="display: block; margin-bottom: 4px; font-weight: 600;">
                            Image principale</label>
                        <input type="file" id="addProductImage" name="image" class="form-control w-100 mb-2" required>
                    </div>

                    <div style="margin-bottom: 12px;">
                        <label for="addProductImage" style="display: block; margin-bottom: 4px; font-weight: 600;">
                            Image secondaire</label>
                        <input type="file" id="addProductImage" name="image2" class="form-control w-100 mb-2" required>
                    </div>

                    <div style="margin-bottom: 12px;">
                        <label for="addProductImage" style="display: block; margin-bottom: 4px; font-weight: 600;">
                            Image 3</label>
                        <input type="file" id="addProductImage" name="image3" class="form-control w-100 mb-2" required>
                    </div>

                    <div style="margin-bottom: 16px;">
                        <label for="addProductDescription"
                            style="display: block; margin-bottom: 4px; font-weight: 600;">Description</label>
                        <textarea id="addProductDescription" name="description" rows="3" class="form-control w-100 mb-2"
                            placeholder="Description du produit..." required></textarea>
                    </div>
                    <div style="margin-bottom: 16px;">
                        <label for="addProductDescription"
                            style="display: block; margin-bottom: 4px; font-weight: 600;">Utilisation</label>
                        <textarea id="addProductDescription" name="utilisation" rows="3" class="form-control w-100 mb-2"
                            placeholder="Utilisation du produit..." required></textarea>
                    </div>
                    <div style="margin-bottom: 16px;">
                        <label for="addProductDescription"
                            style="display: block; margin-bottom: 4px; font-weight: 600;">Precautions</label>
                        <textarea id="addProductDescription" name="precaution" rows="3" class="form-control w-100 mb-2"
                            placeholder="Precaution du produit..." required></textarea>
                    </div>
                    <div style="margin-bottom: 16px;">
                        <label for="addProductDescription"
                            style="display: block; margin-bottom: 4px; font-weight: 600;">Composition</label>
                        <textarea id="addProductDescription" name="composition" rows="3" class="form-control w-100 mb-2"
                            placeholder="Composition du produit..." required></textarea>
                    </div>


                    <div style="display: flex; justify-content: flex-end; gap: 8px;">
                        <button type="button" class="btn btn-secondary" id="cancelAddProduct">Annuler</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Ajouter le
                            produit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Ajouter une publication-->
<div class="modal fade" id="postModal-add-post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une publication ?
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="postForm" method="POST" action="{{ route('admin.addPublication', ['slug' => $user->slug,]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <label>Titre</label><input id="postTitle" name="title" class="form-control w-100 mb-2"
                        placeholder="Titre du post..." required>
                    <label>Image</label><input id="postImage" type="file" name="image" class="form-control w-100 mb-2"
                        required>
                    <label>Contenu</label>
                    <textarea id="postContent" name="content" class="form-control w-100 mb-2"
                        placeholder="Contenu du post..." required></textarea>
                    <div style="height:8px"></div>
                    <div style="display:flex;justify-content:flex-end;gap:8px">
                        <button class="btn btn-secondary" id="cancelPost" data-dismiss="modal">Annuler</button>
                        <button class="btn btn-success" type="submit" id="savePost"><i class="fas fa-save"></i>
                            Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Ajouter une promo-->
<div class="modal fade" id="promoModal-add-promo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une promo ?
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="postForm" method="POST" action="{{ route('admin.addPromo', ['slug' => $user->slug,]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <label>Titre</label><input id="postTitle" name="title" class="form-control w-100 mb-2"
                        placeholder="Titre de la promo..." required>
                    <label>Image</label><input id="postImage" type="file" name="image" class="form-control w-100 mb-2"
                        required>
                    <label>Contenu</label>
                    <textarea id="postContent" name="content" class="form-control w-100 mb-2"
                        placeholder="Contenu de la promo..." required></textarea>
                    <div style="height:8px"></div>
                    <div style="display:flex;justify-content:flex-end;gap:8px">
                        <button class="btn btn-secondary" id="cancelPost" data-dismiss="modal">Annuler</button>
                        <button class="btn btn-success" type="submit" id="savePost"><i class="fas fa-save"></i>
                            Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- visualiser les promotions-->
<div class="modal fade" id="promoModal-show-promo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vos promotions
                </h5>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#promoModal-add-promo">
                    <span><i class="fas fa-plus text-white"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div id="postsList"
                    style="display:flex;flex-direction:column;gap:12px;max-height:520px;overflow:auto;padding-right:6px">
                    @foreach ($promos as $post)
                        <div class="post">
                            <img src="{{ asset('images/' . $post->image) }}" alt="{{ $post->nom }}"
                                style="width:120px;height:80px;object-fit:cover;border-radius:8px">
                            <div style="flex:1;display:flex;flex-direction:column">
                                <div style="display:flex;align-items:center;">
                                    <strong style="font-size:15px">{{ $post->title }}</strong>
                                    <div style="margin-left:8px" class="muted">par {{ $post->user->name }} •
                                        {{ $post->created_at }}
                                    </div>
                                    <div class="actions" style="display:flex;align-items:center;margin-left:auto">
                                        <button class="btn btn-warning text-white" data-toggle="modal"
                                            data-target="#promoModal-edit-{{ $post->id }}"><i
                                                class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger" data-toggle="modal"
                                            data-target="#promoModal-delete-{{ $post->id }}" style="margin-left:8px"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                                <div style="margin-top:8px;color:#334155">{{ $post->content }}</div>
                            </div>
                        </div>
                        <!-- Modifier une promo-->
                        <div class="modal fade" id="promoModal-edit-{{ $post->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form
                                    action="{{ route('admin.promo.editPromo', ['slug' => $user->slug, 'post_id' => $post->id]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modifier la promo
                                                {{ $post->title }} ?
                                            </h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="title" id="title" placeholder="Nouveau titre..."
                                                class="form-control mb-2 w-100">
                                            <input type="file" name="image" id="image" class=" form-control mb-2 w-100">
                                            <textarea type="number" name="content" rows="5" id="price"
                                                class=" form-control mb-2 w-100"
                                                placeholder="Nouveau contenu..."></textarea><br>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button"
                                                data-dismiss="modal">Fermer</button>
                                            <button class="btn btn-primary" type="submit"><i class="fas fa-edit"></i>
                                                Modifier</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Supprimer une promo -->
                        <div class="modal fade" id="promoModal-delete-{{ $post->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer la promo {{ $post->title }}
                                            ?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Confirmer la suppression en appuyant sur "Supprimer"
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" type="button" data-dismiss="modal"
                                            onclick="window.location.href='{{ route('admin.promo.deletePromo', ['slug' => $user->slug, 'post_id' => $post->id]) }}'"><i
                                                class="fas fa-trah"></i> Supprimer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Ajouter un collaborateur-->
<div class="modal fade" id="collaboratorModal-add-co" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un collaborateur ?
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="postForm" method="POST"
                    action="{{ route("admin.collaborator.addCollaborator", ['slug' => $user->slug,]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <label>Nom</label><input id="postTitle" name="name" class="form-control w-100 mb-2"
                        placeholder="Nom..." required>
                    <label>Image url</label><input id="postImage" type="text" name="image"
                        class="form-control w-100 mb-2" required>
                    <label>Secteur d'activite</label><input id="postTitle" name="sector" class="form-control w-100 mb-2"
                        placeholder="Secteur..." required>
                    <label>Description</label>
                    <textarea id="postContent" name="description" class="form-control w-100 mb-2"
                        placeholder="Description..." required></textarea>
                    <div style="height:8px"></div>
                    <div style="display:flex;justify-content:flex-end;gap:8px">
                        <button class="btn btn-secondary" id="cancelPost" data-dismiss="modal">Annuler</button>
                        <button class="btn btn-success" type="submit" id="savePost"><i class="fas fa-save"></i>
                            Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- visualiser les collaborateurs-->
<div class="modal fade" id="collaboratorModal-show-co" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vos collaborateurs
                </h5>
                <button type="button" class="btn btn-success" data-toggle="modal"
                    data-target="#collaboratorModal-add-co">
                    <span><i class="fas fa-plus text-white"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div id="postsList"
                    style="display:flex;flex-direction:column;gap:12px;max-height:520px;overflow:auto;padding-right:6px">
                    @foreach ($collaborators as $co)
                        <div class="post">
                            <img src="{{$co->image}}" alt="{{ $co->name }}"
                                style="width:120px;height:80px;object-fit:cover;border-radius:8px">
                            <div style="flex:1;display:flex;flex-direction:column">
                                <div style="display:flex;align-items:center;">
                                    <strong style="font-size:15px">{{ $co->name }}</strong>
                                    <div>{{ $co->description }}</div>
                                    <div>{{ $co->sector }}</div>
                                    <div class="actions" style="display:flex;align-items:center;margin-left:auto">
                                        <button class="btn btn-danger" data-toggle="modal"
                                            data-target="#collaboratorModal-delete-{{ $co->id }}" style="margin-left:8px"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Supprimer une promo -->
                        <div class="modal fade" id="collaboratorModal-delete-{{ $co->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer le collaborateur
                                            {{ $co->name }}
                                            ?
                                        </h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Confirmer la suppression en appuyant sur "Supprimer"
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" type="button" data-dismiss="modal"
                                            onclick="window.location.href='{{ route('admin.collaborateur.delete', ['slug' => $user->slug, 'id' => $co->id]) }}'"><i
                                                class="fas fa-trah"></i> Supprimer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ajouter un Immobilier-->
<div class="modal fade" id="immoModal-add-immo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un Immobilier ?
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="postForm" method="POST" action="{{ route("admin.immo.addImmo", ['slug' => $user->slug,]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <label>Nom</label><input id="postTitle" name="title" class="form-control w-100 mb-2"
                        placeholder="Nom..." required>
                    <label>Image url</label><input id="postImage" type="text" name="image"
                        class="form-control w-100 mb-2" required>
                    <label>Secteur d'activite</label><input id="postTitle" name="sector" class="form-control w-100 mb-2"
                        placeholder="Secteur..." required>

                    <label>Prix</label><input id="postTitle" name="price" class="form-control w-100 mb-2" min="0"
                        required>

                    <label>Description</label>
                    <textarea id="postContent" name="description" class="form-control w-100 mb-2"
                        placeholder="Description..." required></textarea>
                    <div style="height:8px"></div>
                    <div style="display:flex;justify-content:flex-end;gap:8px">
                        <button class="btn btn-secondary" id="cancelPost" data-dismiss="modal">Annuler</button>
                        <button class="btn btn-success" type="submit" id="savePost"><i class="fas fa-save"></i>
                            Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- visualiser les Immos-->
<div class="modal fade" id="immoModal-show-immo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vos Immobiliers
                </h5>
                <button type="button" class="btn btn-success" data-toggle="modal"
                    data-target="#immoModal-add-immo">
                    <span><i class="fas fa-plus text-white"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div id="postsList"
                    style="display:flex;flex-direction:column;gap:12px;max-height:520px;overflow:auto;padding-right:6px">
                    @foreach ($immos as $immo)
                        <div class="post">
                            <img src="{{$immo->image}}" alt="{{ $immo->title }}"
                                style="width:120px;height:80px;object-fit:cover;border-radius:8px">
                            <div style="flex:1;display:flex;flex-direction:column">
                                <div style="display:flex;align-items:center;">
                                    <strong style="font-size:15px">{{ $immo->title }}</strong>
                                    <div>{{ $immo->description }}</div>
                                    <div>{{ $immo->sector }}</div>
                                    <div>{{ $immo->price }} FCFA</div>
                                    <div class="actions" style="display:flex;align-items:center;margin-left:auto">
                                        <button class="btn btn-danger" data-toggle="modal"
                                            data-target="#immoModal-delete-{{ $immo->id }}" style="margin-left:8px"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Supprimer une promo -->
                        <div class="modal fade" id="immoModal-delete-{{ $immo->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer l'immobilier
                                            {{ $immo->title }}
                                            ?
                                        </h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Confirmer la suppression en appuyant sur "Supprimer"
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" type="button" data-dismiss="modal"
                                            onclick="window.location.href='{{ route('admin.immo.deleteImmo', ['slug' => $user->slug, 'id' => $immo->id]) }}'"><i
                                                class="fas fa-trah"></i> Supprimer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Visualiser les conseils -->
<div class="modal fade" id="conseilModal-show-conseil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vos Conseils
                </h5>
                <button type="button" class="btn btn-success" data-toggle="modal"
                    data-target="#conseilModal-add-conseil">
                    <span><i class="fas fa-plus text-white"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div id="postsList"
                    style="display:flex;flex-direction:column;gap:12px;max-height:520px;overflow:auto;padding-right:6px">
                    @foreach ($conseils as $conseil)
                        <div class="post">
                            <img src="{{$conseil->image}}" alt="{{ $conseil->title }}"
                                style="width:120px;height:80px;object-fit:cover;border-radius:8px">
                            <div style="flex:1;display:flex;flex-direction:column">
                                <div style="display:flex;align-items:center;">
                                    <strong style="font-size:15px">{{ $conseil->title }}</strong>
                                    <div>{{ $conseil->shortDescription }}</div>
                                    <div>{{ $conseil->longDescription }}</div>
                                    <div class="actions" style="display:flex;align-items:center;margin-left:auto">
                                        <button class="btn btn-danger" data-toggle="modal"
                                            data-target="#immoModal-delete-{{ $conseil->id }}" style="margin-left:8px"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Supprimer une promo -->
                        <div class="modal fade" id="immoModal-delete-{{ $conseil->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer le conseil :
                                            {{ $conseil->title }}
                                            ?
                                        </h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Confirmer la suppression en appuyant sur "Supprimer"
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" type="button" data-dismiss="modal"
                                            onclick="window.location.href='{{ route('admin.conseil.deleteConseil', ['slug' => $user->slug, 'id' => $conseil->id]) }}'"><i
                                                class="fas fa-trah"></i> Supprimer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ajouter un conseil-->
<div class="modal fade" id="conseilModal-add-conseil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un Conseil ?
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="postForm" method="POST" action="{{ route("admin.conseil.addConseil", ['slug' => $user->slug,]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <label>Titre</label><input id="postTitle" name="title" class="form-control w-100 mb-2"
                        placeholder="Titre du conseil..." required>
                    <label>Image url</label><input id="postImage" type="text" name="image"
                        class="form-control w-100 mb-2" required>
                    <label>Petite description</label><input id="postTitle" name="shortDescription" class="form-control w-100 mb-2"
                        placeholder="Courte description..." required>

                    <label>Longue Description</label>
                    <textarea id="postContent" name="longDescription" class="form-control w-100 mb-2"
                        placeholder="Longue Description..." required></textarea>
                    <div style="height:8px"></div>
                    <div style="display:flex;justify-content:flex-end;gap:8px">
                        <button class="btn btn-secondary" id="cancelPost" data-dismiss="modal">Annuler</button>
                        <button class="btn btn-success" type="submit" id="savePost"><i class="fas fa-save"></i>
                            Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
