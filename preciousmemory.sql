-- Create the database
CREATE DATABASE preciousMemoriesapp;

-- Use the newly created database
USE preciousMemoriesapp;

-- Create the Projects table with an image column as BLOB
CREATE TABLE Projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    image BLOB NOT NULL  -- Column for storing the image data
);

-- Create the Photos table with an image column as BLOB
CREATE TABLE Photos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image BLOB NOT NULL,  -- Column for storing the image data
    category VARCHAR(100)
);

-- Create the Career table with an image column as BLOB
CREATE TABLE Career (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT NOT NULL,
    skills VARCHAR(255),
    image BLOB  -- Column for storing the image data
);

-- Create the AdminUsers table
CREATE TABLE AdminUsers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Create the Inquiries table for contact messages
CREATE TABLE Inquiries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
ALTER TABLE Photos ADD COLUMN category VARCHAR(50) NOT NULL;
