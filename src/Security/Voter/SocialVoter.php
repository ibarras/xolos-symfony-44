<?
namespace App\Security\Voter;

use App\Entity\IcRegistroUsuarios;
use App\Entity\IcContacto;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class SocialVoter extends Voter
{


    protected function supports($attribute, $subject): bool
    {
        // if the attribute isn't one we support, return false
        if (!in_array($attribute, ['SOCIAL'])) {
            return false;
        }

        // only vote on `Conctact` objects
        if (!$subject instanceof IcContacto) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // un comentario aqui para mostrar los cambios 
        if (!$user instanceof IcRegistroUsuarios) {
            // the user must be logged in; if not, deny access
            return false;
        }
        
        return true; 

        throw new \LogicException('This code should not be reached!');
    }


}