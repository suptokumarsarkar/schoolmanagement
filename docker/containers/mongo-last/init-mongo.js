db.createUser(
    {
        user: 'user',
        pwd: 'gcp',
        roles: [
            {
                role: 'dbOwner',
                db: 'gcp'
            }
        ],
    }
)