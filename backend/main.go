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

    // Initialize Gin router
    r := gin.Default()

    // Routes
    r.POST("/register", controllers.RegisterUserHandler)
    r.POST("/login", controllers.Login)
    // adminRoutes := r.Group("/admin") 
    // {
    //     adminRoutes.GET("/categories", controllers.GetCategories)
    //     adminRoutes.GET("/categories/:id", controllers.GetCategory)
    //     adminRoutes.POST("/categories", controllers.CreateCategory)
    //     adminRoutes.PUT("/categories/:id", controllers.UpdateCategory)
    //     adminRoutes.DELETE("/categories/:id", controllers.DeleteCategory)
    //     adminRoutes.GET("/orders", controllers.GetOrders)
    // }

    // Start the server
    if err := r.Run(":8080"); err != nil {
        log.Fatal("Failed to start server:", err)
    }
}
