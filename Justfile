c *args:
    just composer {{args}}

composer *args:
    docker compose exec app composer {{args}}
