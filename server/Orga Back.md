# MCD

<img src ='images/MCD.png' alt='MCD'>

# Controllers

# rubricController => Gérer la table rubric

|Methodes| url | controllers |commentaires|
|--------|-------------|-------------|------------|
| GET  | /rubric/get/:id | rubricController | récupérer toute les rubriques d'une page |
| POST | /rubric/add/:id_page | rubricController | ajouter une rubric sur une page |
| POST | /rubric/delete/:id | rubricController | supprimer une rubric |
| POST | /rubric/update:id | rubricController | modifier une rubric |


# pageController => gérer la table page

|Methodes| url | controllers |commentaires|
|--------|-----|-------------|------------|
| GET | /page/get/:id | pageController | afficher la page d'un utilisateur |
| POST | /page/add | pageController | créer une page |
| POST | /page/update/:id_user | pageController | si admin modifier le contenu d'une page |
| POST | /page/delete/:id_user | pageController | si admin supprimer une page |

# groupController => gérer les groupes

|Methodes| url | controllers |commentaires|
|--------|-----|-------------|------------|
| POST | /groups/create | groupController | Créer un groupe public ou privé |
| POST | /groups/join/:id_goup | groupController | S'inscrire à un groupe public |
| POST | /groups/apply/:id_goup | groupController | Candidater à un groupe privé |
| GET  | /group/publications/:id_group | groupController | Voir les publications d'un groupe pour les membres du groupe|
| POST | /groups/invite/:id_user/:id_group | groupController | Inviter ses relations au groupe |
| POST | /groups/approve/:id_user | groupController | Accepter ou refuser les candidatures à un groupe privé si l'utilisateur est admin |
| POST | /groups/user/update/rights/:id_user | groupController | Changer les droits d'un utilisateur si admin (admin/membre) |
| POST | /groups/user/delete/:id_user | groupController |Si admin exclure un membre d'un groupe |
| POST | /groups/update/info/:id_admin | groupController | Si admin changer les informations du groupe (nom, description, image) |


# roleController => gérer les rôles des utilisateurs 

|Methodes| url | controllers |commentaires|
|--------|-----|-------------|------------|
| POST | /role/update/:id_user | roleController | si le user est admin modifier un rôle |
| POST | /role/delete/:id_supert_admin | roleController | si le user est admin supprimer un rôle |
| POST | /role/add/:id_supert_admin  | roleController | si le user est suppert admin ajoute un rôle |


# promoController => gérer les promos

|Methodes| url | controllers |commentaires|
|--------|-----|-------------|------------|
| GET  | /promo/get | promoController | afficher toute les promos |
| GET  | /promo/get/post/:id | promoController | afficher le détail d'une promo, lorsque l'on clique sur une promo avec la liste des élève |
| POST | /promo/add/:id_supert_admin | promoController | ajouter une promo |
| POST | /promo/delete/:id_super_admin | promoController | supprimer une promo |
| POST | /promo/update/:id_super_admin | promoController | mettre à jour une promo |


# commentController => gérer les commentaires d'une publication 

|Methodes| url | controllers |commentaires|
|--------|-----|-------------|------------|
| GET | /comment/get/:id_publication | commentController | récupérer les commentaires d'une publication |
| POST | /comment/add/:id_publication |  commentController | ajouter un commentaire sur une pubpication
| POST | /comment/update/:id/:id_user | commentController | si autheur du commentaire modifier le commentaire |
| POST | /comment/delete/:id/:id_user | commentController | si autheur ou admin Supprimer un commentaire |


# messageController => gérer les messages privé et public entre utilisateurs

|Methodes| url | controllers |commentaires|
|--------|-----|-------------|------------|
| POST | /message/:id_Receiver/:id_Transmitter/ | messageController  | envoyer un message privé |
| GET  | /message/:id_Receiver/:id_Transmitter/  |  messageController  | recevoir et afficher un message privé reçu # ?|
| POST | /message/update/:id/:id_transmitter | messageController | si auteur du message modifier un message |
| POST | /message/delete/:id/:id_user | messageController | si auteur ou receveur du message supprimer un message |

# userController => gérer les utilisateurs

|Methodes| url | controllers |commentaires|
|--------|-----|-------------|------------|
| POST | /profile/update | userController | Modifier ses informations personnelles |
| POST | /profile/deactivate | userController | Désactiver son compte |
| POST | /profile/reactivate | userController | Réactiver son compte |
| POST | /profile/delete | userController | Supprimer son compte |
| POST | /profile/signup | userController | Créer un compte |
| POST | /profile/login | userController | Se connecter |
| POST | /profile/logout | userController | Se déconnecter|
| GET | /profile/relation/search/:params | connectController | rechercher une relation||l


# feedController => gérer le contenu d'un user

|Methodes| url | controllers |commentaires|
|--------|-----|-------------|------------|
| GET | /profile/feed/:id_user | feedController | toute les publications d'un user |
| POST | /profile/feed/add/:id_user | feedController | ajouter le feed d'un user |
| POST | /profile/feed/delete/:id | feedController | supprimer le feed d'un user |
| POST | /profile/feed/update/:id | feedController | mettre a jour le feed d'un user |

# connectController => gérer les connexions entre user

|Methodes| url | controllers |commentaires|
|--------|-----|-------------|------------|
| GET | /relation/:id_user  | connectController | afficher toutes ses relations d'un user |
| POST | /relation/add/:id_user | connectController | ajouter un user comme relation |
| POST | /relation/delete/:id | connectController | supprimer une relation |


# publicationController => gérer les publications

|Methodes| url | controllers |commentaires|
|--------|-----|-------------|------------|
| POST  | /publication/add/:id_group | publicationController | publier la publication dans un groupe |
| GET  | /publication/get/:id | publicationController | afficher la publication |
| POST | /ublication/update/:id | publicationController | modifier la publication |
|  POST  | /publication/delete/:id | publicationController | supprimer la publication |
| GET  | /publication/get | publicationController | afficher les publications | 


# memberController => gérer les membres

|Methodes| url | controllers |commentaires|
|--------|-----|-------------|------------|
| POST | /group/join/:id_user/:id_group | memberController | rejoindre un groupe |
| POST | /group/quit/:id_user | memberController | Quitter un groupe |

