<?php
echo password_hash('tetettoeng', PASSWORD_DEFAULT) . "<br />";

if (password_verify("kangeditor", "$2y$10$44l1gJWm4idaVQlIkasjYu0Xhmx7roD7.uUq2L4emiOhKZIlDIhQu")) {
    echo "Pass benar";
} else {
    echo "Pass salah";
}
