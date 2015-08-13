##Introduction
##Installation 
###Composer 
```
    "rofil/user": "dev-master"
```
and running `composer update`
###Register at AppKernel.php
```
    new Rofil\Admin\UserBundle\RofilAdminUserBundle(),
```

##Configuration of Security
```
security:
    encoders:
        Symfony\Component\Security\Core\User\User: plaintext
        Rofil\Admin\UserBundle\Entity\User: plaintext
    role_hierarchy:
        ROLE_ADMIN: [ROLE_USER, ROLE_MANAGER]
        ROLE_MANAGER: [ROLE_USER]
    providers:
        chain_provider:
            chain:
                providers: [in_memory, user_db]
        in_memory:
            memory:
                users:
                    rofilde: { password: rofildehasudungan, roles: ROLE_ADMIN }
        user_db:
            entity: { class: RofilAdminUserBundle:User, property: username }
    firewalls:
        dev:
            pattern: ^/(_(profiler|wdt|error)|css|images|js)/
            security: false
        default:
            pattern: /.*
            form_login:
                login_path: /login
                check_path: /login_check
                default_target_path: /
            logout:
                path: /logout
                target: /
            security: true
            anonymous: true
    access_control:
        - { path: /login, roles: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: /register, roles: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/manage/user, roles: ROLE_ADMIN }
        - { path: ^/manage, roles: ROLE_MANAGER }
        - { path: ^/postingan, roles: ROLE_MANAGER }
        - { path: ^/.*/admin, roles:ROLE_USER }
        - { path: /.*, roles: IS_AUTHENTICATED_ANONYMOUSLY }
```
###Routing at routing.yml
```
    rofil_admin_user:
        resource: "@RofilAdminUserBundle/Controller/"
        type:     annotation
        prefix:   /
```