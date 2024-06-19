package main

import (
	"backend/controllers"
	"backend/migrations"
	"backend/setup"

	"github.com/gin-gonic/gin"
)

func main() {
    setup.Connect()
    db := setup.DB

    // Run Migrations
    migrations.Migrate(db)

    r := gin.Default()
    // Define routes and controllers here

    r.POST("/api/register", controllers.Register)
    r.POST("/api/login", controllers.Login)

    r.Run() // listen and serve on 0.0.0.0:8080
}
