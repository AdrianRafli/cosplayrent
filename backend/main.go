package main

import (
    "backend/controllers"
    "backend/database"
    "github.com/gin-gonic/gin"
    // "gorm.io/gorm"
    "log"
)

func main() {
    // Connect to the database
    database.Connect()

    // Get the DB instance
    db := database.GetDB()

    // Auto migrate tables
    database.MigrateUser(db)
    database.MigrateShop(db) // If you have a shop model

    // Initialize Gin router
    r := gin.Default()

    // Routes
    r.POST("/register", controllers.RegisterUserHandler)

    // Start the server
    if err := r.Run(":8080"); err != nil {
        log.Fatal("Failed to start server:", err)
    }
}
