define({ "api": [
  {
    "type": "post",
    "url": "/auth/get",
    "title": "Sign in",
    "name": "Authentication",
    "group": "Authentication",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Password.</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/auth/get"
      }
    ],
    "version": "0.0.0",
    "filename": "App/Controllers/Auth.php",
    "groupTitle": "Authentication"
  },
  {
    "type": "get",
    "url": "/",
    "title": "Home",
    "name": "Home",
    "group": "Home",
    "sampleRequest": [
      {
        "url": "/"
      }
    ],
    "version": "0.0.0",
    "filename": "App/Controllers/Home.php",
    "groupTitle": "Home"
  },
  {
    "type": "post",
    "url": "/users/create",
    "title": "Create user",
    "name": "Create_user",
    "group": "Users",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "role_id",
            "description": "<p>Role id.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Password</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/users/create"
      }
    ],
    "version": "0.0.0",
    "filename": "App/Controllers/Users.php",
    "groupTitle": "Users"
  },
  {
    "type": "post",
    "url": "/users/delete",
    "title": "Delete user",
    "name": "Delete_user",
    "group": "Users",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "user_id",
            "description": "<p>User id.</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/users/delete"
      }
    ],
    "version": "0.0.0",
    "filename": "App/Controllers/Users.php",
    "groupTitle": "Users"
  },
  {
    "type": "post",
    "url": "/users/update",
    "title": "Update user",
    "name": "Update_user",
    "group": "Users",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "user_id",
            "description": "<p>User id.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "role_id",
            "description": "<p>Role id.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Password</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/users/update"
      }
    ],
    "version": "0.0.0",
    "filename": "App/Controllers/Users.php",
    "groupTitle": "Users"
  },
  {
    "type": "get",
    "url": "/users/get",
    "title": "Get all users",
    "name": "Users",
    "group": "Users",
    "sampleRequest": [
      {
        "url": "/users/get"
      }
    ],
    "version": "0.0.0",
    "filename": "App/Controllers/Users.php",
    "groupTitle": "Users"
  }
] });