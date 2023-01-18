-- AlterTable
ALTER TABLE `User` MODIFY `privateKey` TEXT NOT NULL,
    MODIFY `publicKey` VARCHAR(191) NOT NULL;
