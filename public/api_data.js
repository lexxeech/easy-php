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
    "type": "post",
    "url": "/auth/out",
    "title": "Sign out",
    "name": "Sign_out",
    "group": "Authentication",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Access token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/auth/out"
      }
    ],
    "version": "0.0.0",
    "filename": "App/Controllers/Auth.php",
    "groupTitle": "Authentication"
  },
  {
    "type": "post",
    "url": "/comments/create",
    "title": "Create comment",
    "name": "Comments_create",
    "group": "Comments",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Access token</p>"
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "post_id",
            "description": "<p>Post id.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "comment",
            "description": "<p>Comment.</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/comments/create"
      }
    ],
    "version": "0.0.0",
    "filename": "App/Controllers/Comments.php",
    "groupTitle": "Comments"
  },
  {
    "type": "post",
    "url": "/comments/update",
    "title": "Update comments",
    "name": "Comments_update",
    "group": "Comments",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Access token</p>"
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "comment_id",
            "description": "<p>Comment id.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "comment",
            "description": "<p>Comment.</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/comments/update"
      }
    ],
    "version": "0.0.0",
    "filename": "App/Controllers/Comments.php",
    "groupTitle": "Comments"
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
    "url": "/posts/create",
    "title": "Create post",
    "name": "Post_create",
    "group": "Posts",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Access token</p>"
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "img",
            "description": "<p>Image</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "title",
            "description": "<p>Title</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "body",
            "description": "<p>Body</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/posts/create"
      }
    ],
    "version": "0.0.0",
    "filename": "App/Controllers/Posts.php",
    "groupTitle": "Posts"
  },
  {
    "type": "post",
    "url": "/posts/delete",
    "title": "Delete post",
    "name": "Post_delete",
    "group": "Posts",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Access token</p>"
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "post_id",
            "description": "<p>Post id.</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/posts/delete"
      }
    ],
    "version": "0.0.0",
    "filename": "App/Controllers/Posts.php",
    "groupTitle": "Posts"
  },
  {
    "type": "post",
    "url": "/posts/get-by",
    "title": "Get post",
    "name": "Post_get",
    "group": "Posts",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Access token</p>"
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "post_id",
            "description": "<p>Post id.</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/posts/get-by"
      }
    ],
    "version": "0.0.0",
    "filename": "App/Controllers/Posts.php",
    "groupTitle": "Posts"
  },
  {
    "type": "post",
    "url": "/posts/update",
    "title": "Update post",
    "name": "Post_update",
    "group": "Posts",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Access token</p>"
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "post_id",
            "description": "<p>Post id.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "img",
            "description": "<p>Image</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "title",
            "description": "<p>Title</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "body",
            "description": "<p>Body</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/posts/update"
      }
    ],
    "version": "0.0.0",
    "filename": "App/Controllers/Posts.php",
    "groupTitle": "Posts"
  },
  {
    "type": "get",
    "url": "/posts/get",
    "title": "Get all posts",
    "name": "Posts_get",
    "group": "Posts",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Access token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/posts/get"
      }
    ],
    "version": "0.0.0",
    "filename": "App/Controllers/Posts.php",
    "groupTitle": "Posts"
  },
  {
    "type": "post",
    "url": "/users/create",
    "title": "Create user",
    "name": "Create_user",
    "group": "Users",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Access token</p>"
          }
        ]
      }
    },
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
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Access token</p>"
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
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Access token</p>"
          }
        ]
      }
    },
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
    "url": "/users/get-by",
    "title": "Get user",
    "name": "User",
    "group": "Users",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Access token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/users/get-by"
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
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Access token</p>"
          }
        ]
      }
    },
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
