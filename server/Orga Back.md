# MCD

# Controllers

## rubricController => Gérer la table rubric

|Methodes| url | controllers |commentaires|
|--------|-------------|-------------|------------|
| GET  | /rubric/:id | rubricController | récupérer toute les rubriques d'une page |
| POST  | /addRubric/:id_page | rubricController | ajouter une rubric sur une page |
| POST | /deleteRubric/:id | rubricController | supprimer une rubric |
| POST | /updateRubric/:id | rubricController | modifier une rubric |


## pageController => gérer la table page

|Methodes| url | controllers |commentaires|
|--------|-----|-------------|------------|
| GET | /getPage | pageController | afficher la page d'un utilisateur |
| POST | /addPage | pageController | créer une page |
| POST | /modifyPage/:id_user | pageController | modifier le contenu d'une page |
| POST | /deletePage/:id_user | pageController | supprimer une page |

## groupController => gérer les groupes de messages

|Methodes| url | controllers |commentaires|
|--------|-----|-------------|------------|
| POST | /groups/create | groupController | Créer un groupe public ou privé |
| POST | /groups/join | groupController | S'inscrire à un groupe public |
| POST | /groups/apply | groupController | Candidater à un groupe privé |
| GET  | /groups/public | groupController | Voir les publications des groupes publics |
| GET  | /groups/private | groupController | Voir les publications des groupes privés auxquels on est inscrit |
| POST | /groups/invite | groupController | Inviter ses relations au groupe |
| POST | /groups/approve | groupController | Accepter ou refuser les candidatures à un groupe privé |
| POST | /groups/modifyUserRights | groupController | Changer les droits d'un utilisateur (admin/membre) |
| POST | /groups/removeUser | groupController | Exclure un membre d'un groupe |
| POST | /groups/modifyInfo | groupController | Changer les informations du groupe (nom, description, image) |
<!-- | POST | /group/channel  | groupController  | Pouvoir participer ou démarrer à un channel | -->


## roleController => gérer les rôles des utilisateurs 

|Methodes| url | controllers |commentaires|
|--------|-----|-------------|------------|
| POST | /addRole | roleController | ajouter un rôle |
| POST | /deleteRole | roleController | supprimer un rôle |
| POST | /modifyRole | roleController | modifier un rôle |

## promoController => gérer les promos des utilisateurs

|Methodes| url | controllers |commentaires|
|--------|-----|-------------|------------|
| GET  | /getPromo | promoController | afficher toute les promos |
| GET  | /getPromo/:id | promoController | afficher le détail d'une promo, lorsque l'on clique sur une promo |
| POST | /addPromo | promoController | ajouter une promo |
| POST | /delectPromo | promoController | supprimer une promo |
| POST | /updatePromo | promoController | mettre à jour une promo |


## commentController => gérer les commentaires d'une publication 

|Methodes| url | controllers |commentaires|
|--------|-----|-------------|------------|
| GET | /getAllComments/:id_publication | commentController | récupérer les commentaires d'une publication |
| POST  | /addComment    |  commentController | ajouter un commentaire
| POST | /updateComment/:id | commentController | modifier un commentaire |
| POST | /deleteComment/:id | commentController | Supprimer un commentaire |


## messageController => gérer les messages privé et public entre utilisateurs

|Methodes| url | controllers |commentaires|
|--------|-----|-------------|------------|
| POST |   /message/:id_Receiver/:id_Transmitter/ | messageController  | envoyer un message |
| GET  | /message/:id_Receiver/:id_Transmitter/  |  messageController  | recevoir et afficher un message reçu |
| POST | /message/:id | messageController | modifier un message |
| POST | /message/:id | messageController | supprimer un message |

## userController => gérer les utilisateurs

|Methodes| url | controllers |commentaires|
|--------|-----|-------------|------------|
| POST | /profile/update | userController | Modifier ses informations personnelles |
| POST | /profile/update/photo | userController | Modifier sa photo de profil et bannière |
| POST | /profile/deactivate | userController | Désactiver son compte |
| POST | /profile/reactivate | userController | Réactiver son compte |
| POST | /profile/delete | userController | Supprimer son compte |
| POST | /signup | userController | Créer un compte |
| POST | /login | userController | Se connecter |
| POST | /logout | userController | Se déconnecter |
| GET | /relation  | userController | afficher toutes ses relations 
| POST | /relation/add | userController | ajouter une relation |
| POST | /relation/delete | userController | supprimer une relation |
| GET | /relation/search | userController | rechercher une relation |
| GET | /feed | userController | afficher le fil d'actualité |




## publicationController => gérer les publications

|Methodes| url | controllers |commentaires|
|--------|-----|-------------|------------|
| POST  | /sendPublication/:id | publier la publication |
| GET  | /getPublication/:id | afficher la publication |
| POST | /updatePublication/:id | modifier la publication |
|  POST  | /deletePublication/:id | supprimer la publication |
| GET  | /getPublication | afficher les publications | 
| POST | /sharePublication | partager la publication |


## memberController => gérer les membres

|Methodes| url | controllers |commentaires|
|--------|-----|-------------|------------|
| POST | /joinGroup/:id | rejoindre un groupe |
| POST | /quitGroup/:id | Quitter un groupe |

